<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\JobInfo;
class FrontEndController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::orderByDesc('created_at')->paginate(12);
        return view('frontend.blog.blog_list', compact('blogs'));
    }
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        if (!$blog) {
            abort(404, 'Blog not found');
        }
        $jobs = JobInfo::orderby('id', 'DESC')->limit(5)->get();
        // Fetch recent blogs
        $recentBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(5)
            ->get();

        // Fetch related ads based on the same designation_id
        $relatedAds = Blog::where('designation_id', $blog->designation_id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.blog.blog_detail', compact('blog', 'recentBlogs', 'relatedAds','jobs'));
    }
}
