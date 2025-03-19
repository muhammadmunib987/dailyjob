<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Blog;
use Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create', [
            'designations' => Designation::all(),
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
        ]);
    
        // Handle feature image upload if present
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique file name
            $image->move(public_path('storage/assets/img'), $imageName); // Move image to public storage
            $imagePath = 'assets/img/' . $imageName; // Relative path to store in DB
        }
    
        // Create a new blog post
        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'content' => $request->content,
            'feature_image' => $imagePath,
            'tags' => $request->tags ? json_encode(explode(',', $request->tags)) : null,
            'status' => $request->status,
            'published_at' => $request->published_at ?? now(),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
    
        return redirect()->back()->with('success', 'Blog post created successfully!');
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
