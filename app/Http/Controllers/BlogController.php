<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(Request $request)
    {
        // Fetch all services
        $services = Service::all();

        // Fetch blogs filtered by service if a service_id is provided
        $query = Blog::withCount('comments')->orderBy('created_at', 'desc');
        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }
        $blogs = $query->get();

        // Pass blogs and services to the view
        return view('blog', compact('blogs', 'services'));
    }



    public function Blogdetail($id)
    {
        // Find the blog by ID
        $blog = Blog::findOrFail($id); // Throws a 404 if the blog is not found

        // Fetch recent blogs for the sidebar
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        // Pass the blog and recent blogs to the view
        return view('blog-details', compact('blog', 'recentBlogs'));
    }



    public function index()
    {
        $blogs = Blog::with('service')->get(); // Fetch blogs with related services
        $services = Service::all(); // Fetch all services for the dropdown
        return view('admin.blogs.index', compact('blogs', 'services'));
    }


    public function store(Request $request)
    {

        // Validate the request input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'service_id' => 'nullable|exists:services,id', // Validate that service_id exists in the services table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        try {
            // Handle the image upload (if provided)
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('blogs', 'public');
            }

            // Create the blog with all validated fields, including service_id
            Blog::create($validated);

            return redirect()->route('adminblogs.index')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            \Log::error('Blog creation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Blog creation failed.']);
        }
    }


    public function edit(Blog $blog)
    {
        $services = Service::all(); // Fetch all services for the dropdown
        return view('admin.blogs.edit', compact('blog', 'services'));
    }
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'service_id' => 'nullable|exists:services,id', // Validate that the service exists
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Update the blog fields
            $blog->title = $validated['title'];
            $blog->content = $validated['content'];
            $blog->service_id = $validated['service_id'] ?? null; // Ensure the service_id is assigned

            // Handle new image upload
            if ($request->hasFile('image')) {
                if ($blog->image && Storage::exists('public/' . $blog->image)) {
                    Storage::delete('public/' . $blog->image);
                }
                $blog->image = $request->file('image')->store('blogs', 'public');
            }

            // Save updated data
            $blog->save();

            return redirect()->route('adminblogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Blog update failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Blog update failed.']);
        }
    }


    public function destroy(Blog $blog)
    {
        if ($blog->image && Storage::exists('public/' . $blog->image)) {
            Storage::delete('public/' . $blog->image);
        }

        $blog->delete();

        return redirect()->route('adminblogs.index')->with('success', 'Blog deleted successfully.');
    }
}
