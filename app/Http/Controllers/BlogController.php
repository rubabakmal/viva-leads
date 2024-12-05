<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show()
    {
        return view('blog');
    }

    public function Blogdetail()
    {
        return view('blog-details');
    }

    public function index()
    {
        $blogs = Blog::all(); // Fetch all blogs
        return view('admin.blogs.index', compact('blogs'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation

        ]);

        // Handle the image upload (if provided)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public'); // Save image to "storage/app/public/blogs"
            $validated['image'] = $imagePath;
        }

        // Create the blog
        Blog::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $validated['image'] ?? null,

        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Blog created successfully!');
    }
    public function update(Request $request, Blog $blog)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Update blog data
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');

            // Handle new image upload
            if ($request->hasFile('image')) {
                if ($blog->image && \Storage::exists('public/' . $blog->image)) {
                    \Storage::delete('public/' . $blog->image);
                }
                $blog->image = $request->file('image')->store('blogs', 'public');
            }

            // Save updated data
            $blog->save();

            // Redirect with success message
            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Blog update failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Blog update failed.']);
        }
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
