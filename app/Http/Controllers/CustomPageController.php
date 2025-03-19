<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\JobInfo;
use App\Models\CustomPage;
class CustomPageController extends Controller
{
    public function show($slug) {
        $page = CustomPage::where('slug', $slug)->firstOrFail();
    
        // Use the page's metadata if available; otherwise, use default values
        $metaData = [
            'meta_title' => $page->meta_title ?? config('constants.meta_title'),
            'meta_description' => $page->meta_description ?? config('constants.meta_description'),
            'meta_keywords' => $page->meta_keywords ?? config('constants.meta_keywords'),
        ];
        return view('frontend.custom_page', compact('page', 'metaData'));
    }
    
    public function jobDetail($id) {
        $job = JobInfo::with('skills','jobType')->where('id', $id)->firstOrFail();
        
        $similar_jobs = JobInfo::
        where('designation_id',$job->designation_id)
        ->where('id', '!=', $job->id) // Exclude the current job
        ->limit(4) // Limit results
        ->get();

        return view('frontend.job_detail', compact('job','similar_jobs'));
    }
}
