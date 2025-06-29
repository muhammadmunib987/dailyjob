<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Blog;
use Str;
use Exception;
use Illuminate\Validation\ValidationException;

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
        try {
            // Validate only title and short_description
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'required|string|max:500',
            ]);

            // Prepare payload for insertion
            $payload = [
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'short_description' => $validated['short_description'],
                'content' => $request->content,
                'tags' => $request->tags ? json_encode(explode(',', $request->tags)) : null,
                'status' => $request->status ?? 'draft',
                'published_at' => $request->published_at ?? now(),
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ];

            // Handle feature image upload if present
            if ($request->hasFile('feature_image')) {
                $payload['feature_image'] =$this->uploadDocument($request->file('feature_image'));
            }

            // Create Blog Post
            Blog::create($payload);

            return redirect()->back()->with('success', 'Blog post created successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (Exception $e) {
            \Log::error('Blog Creation Error', ['error' => $e->getMessage(), 'request' => $request->all()]);
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }
    private function uploadDocument($file, $folder = 'storage/assets/blog_document')
    {
        if (!$file) {
            return null;
        }

        // Generate a unique filename
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Define the full path where the file will be stored
        $filePath = $folder . '/' . $fileName;

        // Move file to public folder
        $file->move(public_path($folder), $fileName);

        // Return relative path (so it can be accessed via asset())
        return 'public/'.$filePath;
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
