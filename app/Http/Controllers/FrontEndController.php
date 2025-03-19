<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function blogs(){
        $blogs= Blog::paginate(10);
        return view('frontend.blog.blog_list',compact('blogs'));
    }
}
