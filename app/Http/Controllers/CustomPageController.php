<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\JobInfo;
use App\Models\CustomPage;
class CustomPageController extends Controller
{
    public function show($slug) {
        $page = CustomPage::where('slug', $slug)->firstOrFail();
        return view('frontend.custom_page', compact('page'));
    }
    public function jobDetail($id) {
        $job = JobInfo::with('skills','jobType')->where('id', $id)->firstOrFail();
        
        $similar_jobs = JobInfo::whereHas('skills', function ($query) use ($job) {
            $query->whereIn('skills.id', $job->skills->pluck('id'));
        })
        ->where('id', '!=', $job->id) // Exclude the current job
        ->limit(5) // Limit results
        ->get();

        return view('frontend.job_detail', compact('job','similar_jobs'));
    }
}
