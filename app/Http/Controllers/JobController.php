<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Designation;
use App\Models\Contact;
use App\Models\JobType;
use App\Models\Skill;
use App\Models\Education;
use App\Models\JobInfo;
use Illuminate\Support\Facades\Crypt;

class JobController extends Controller
{
    /**-
     * 3
     * Display a listing of the resource.
     */
    public function home()
    {
        // Get the latest jobs with pagination
        $jobs = JobInfo::orderby('id', 'DESC')->limit(8)->get();
        $categories = Category::where('status', 1)->orderBy('title')->get();
        // Get designations with job count
        $designations = Designation::select('designations.*')
            ->withCount('jobs') // Assuming a relationship exists
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get();
    
        // Meta description
        $metaData = [
            'meta_title' => 'Find the Latest Jobs in Pakistan - DailyJobs',
            'meta_description' => 'Discover the most recent job openings in Pakistan, including government and private sector positions. Apply today!',
            'meta_keywords' => 'jobs in Pakistan, government jobs, private jobs, careers, employment',
        ];
    
        return view('home', compact('jobs', 'categories','designations', 'metaData'));
    }
    public function categories()
    {
        $designations = Designation::select('designations.*')
            ->withCount('jobs') // Assuming a relationship exists
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get();
    
        // Meta description
        $metaData = [
            'meta_title' => 'Find the Latest Jobs in Pakistan - DailyJobs',
            'meta_description' => 'Discover the most recent job openings in Pakistan, including government and private sector positions. Apply today!',
            'meta_keywords' => 'jobs in Pakistan, government jobs, private jobs, careers, employment',
        ];
    
        return view('categories', compact('designations', 'metaData'));
    }
    
    public function searchJobs(Request $request, $encryptedId = null, $type = null) {
        try {
            $query = JobInfo::orderBy('id', 'DESC');
    
            // Decrypt ID if present
            $id = $encryptedId ? Crypt::decrypt($encryptedId) : null;
    
            // Apply filtering based on type (category, designation, job type)
            if ($id && $type) {
                if ($type === 'category') {
                    $query->where('category_id', $id);
                } elseif ($type === 'designation') {
                    $query->where('designation_id', $id);
                } elseif ($type === 'job_type') {
                    $query->where('job_type_id', $id);
                }
            }
    
            // Search filters
            if ($request->filled('keyword')) {
                $query->where('title', 'like', '%' . $request->keyword . '%');
            }
    
            if ($request->filled('location')) {
                $query->where('location', 'like', '%' . $request->location . '%');
            }
    
            if ($request->filled('category')) {
                $query->where('category_id', $request->category);
            }
    
            if ($request->filled('designation')) {
                $query->whereIn('designation_id', (array) $request->designation);
            }
    
            if ($request->filled('job_type')) {
                $query->whereIn('job_type_id', (array) $request->job_type);
            }
    
            if ($request->filled('education')) {
                $query->whereIn('education_id', (array) $request->education);
            }
    
            if ($request->filled('experience')) {
                $experienceRanges = [
                    '11' => [1, 2], '21' => [2, 3], '31' => [3, 4],
                    '41' => [4, 5], '51' => [5, 7], '61' => [7, 10],
                ];
                $selectedExperiences = array_map(fn($id) => $experienceRanges[$id] ?? null, (array) $request->experience);
                $query->where(function ($q) use ($selectedExperiences) {
                    foreach ($selectedExperiences as $exp) {
                        if ($exp) $q->orWhereBetween('min_experience', $exp);
                    }
                });
            }
    
            if ($request->filled('salary')) {
                $salaryRanges = [
                    '1' => [0, 10000], '2' => [10000, 15000], '3' => [15000, 20000],
                    '4' => [20000, 30000], '5' => [30000, 40000],
                ];
                $selectedRanges = array_map(fn($id) => $salaryRanges[$id] ?? null, (array) $request->salary);
                $query->where(function ($q) use ($selectedRanges) {
                    foreach ($selectedRanges as $range) {
                        if ($range) $q->orWhereBetween('min_salary', $range);
                    }
                });
            }
    
            if ($request->filled('job_shift')) {
                $query->whereIn('job_shift', (array) $request->job_shift);
            }
    
            if ($request->filled('gender')) {
                $query->where('gender', $request->gender);
            }
    
            // Paginate results
            $jobs = $query->paginate(10);
    
            // Load filters
            $categories = Category::where('status', 1)->orderBy('title')->get();
            $designations = Designation::orderBy('title')->get();
            $educations = Education::orderBy('name')->get();
            $jobTypes = JobType::orderBy('title')->get();
    
            return view('frontend.all_jobs', compact('jobs', 'categories', 'designations', 'educations', 'jobTypes'));
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid ID');
        }
    }
    

    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(10); // Pagination applied
        return view('dashboard', compact('contacts'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $designations = Designation::all();
        $jobTypes = JobType::all();
        $skills = Skill::all();
        $educations = Education::all();
    
        return view('admin.jobs.create', compact('categories', 'designations', 'jobTypes', 'skills','educations'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'designation_id' => 'required',
            'location' => 'required|string|max:255',
            'job_description' => 'required',
            'job_requirement' => 'required',
            'min_experience' => 'required|integer|min:0',
            'max_experience' => 'required|integer|min:0',
            'skills' => 'array',
        ]);

    // Handle Category
    if ($request->category_id == 0 && !empty($request->category_name)) {
        $category = Category::firstOrCreate(['title' => $request->category_name]);
        $category_id = $category->id;
    } else {
        $category_id = $request->category_id;
    }

    // Handle Designation
    if ($request->designation_id == 0 && !empty($request->designation_name)) {
        $designation = Designation::firstOrCreate(['title' => $request->designation_name]);
        $designation_id = $designation->id;
    } else {
        $designation_id = $request->designation_id;
    }

    // Create JobInfo Record
    $job = JobInfo::create([
        'title' => $request->title,
        'category_id' => $category_id,
        'designation_id' => $designation_id,
        'job_type_id' => $request->job_type_id,
        'education_id' => $request->education_id,
        'min_experience' => $request->min_experience,
        'max_experience' => $request->max_experience,
        'min_salary' => $request->min_salary,
        'max_salary' => $request->max_salary,
        'no_of_position' => $request->no_of_position,
        'job_shift' => $request->job_shift,
        'gender' => $request->gender,
        'job_expiry_date' => $request->job_expiry_date,
        'job_contact_email' => $request->job_contact_email,
        'job_contact_no' => $request->job_contact_no,
        'location' => $request->location,
        'job_description' => $request->job_description,
        'job_requirement' => $request->job_requirement,
        'external_website_link' => $request->external_website_link,
        'apply_via' => $request->apply_via,
        'created_by' => auth()->user()->id,
    ]);
    

    // Attach Skills
    if ($request->has('skills')) {
        $job->skills()->sync($request->skills);
    }

    return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
