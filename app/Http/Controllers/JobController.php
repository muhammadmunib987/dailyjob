<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Designation;
use App\Models\JobType;
use App\Models\Skill;
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
        // Start the query
        $query = JobInfo::orderby('id','DESC');
        // Get results with pagination
        $jobs = $query->limit(8)->get(); 
        return view('home', compact('jobs'));
    }
    public function index($encryptedId, $type) {
        try {
            $id = Crypt::decrypt($encryptedId);
            
            // Start the query
            $query = JobInfo::orderby('id','DESC');
            // Apply filter dynamically based on type
            if ($type === 'category') {
                $query->where('category_id', $id);
            } elseif ($type === 'job_type') {
                $query->where('job_type_id', $id);
            }
    
            // Get results with pagination
            $jobs = $query->paginate(10); // Adjust pagination as needed
         
            return view('frontend.all_jobs', compact('jobs'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid ID');
        }
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
    
        return view('admin.jobs.create', compact('categories', 'designations', 'jobTypes', 'skills'));
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
        'location' => $request->location,
        'job_description' => $request->job_description,
        'job_requirement' => $request->job_requirement,
        'min_experience' => $request->min_experience,
        'max_experience' => $request->max_experience,
        'no_of_position' => $request->no_of_position,
        'job_shift' => $request->job_shift,
        'gender' => $request->gender,
        'job_expiry_date' => $request->job_expiry_date,
        'job_contact_email' => $request->job_contact_email,
        'min_salary' => $request->min_salary,
        'max_salary' => $request->max_salary,
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
