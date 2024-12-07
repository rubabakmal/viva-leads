<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show()
    {
        // Fetch all blogs from the database
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $blogs = Blog::withCount('comments')->get(); // Fetch blogs with comment counts

        // Pass the blogs data to the view
        return view('blog', compact('blogs'));
    }

    public function Blogdetail($id)
    {
        // Find the blog by ID
        $blog = Blog::findOrFail($id); // Throws a 404 if the blog is not found

        // Fetch recent blogs for the sidebar
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();

        // Pass the blog and recent blogs to the view
        return view('blog-details', compact('blog', 'recentBlogs'));
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
            return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Blog update failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Blog update failed.']);
        }
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
