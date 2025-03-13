<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
       
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'categories' => 'nullable|array',
        //     'content' => 'required|string',
        // ]);

        $res=Post::create([
            'title' => $request->title,
            'categories' => $request->categories,
            'content' => $request->content,
        ]);
     
        return redirect()->back()->with('success', 'Blog post created successfully!');
    }
}
