<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Public Services Page
     */
    public function index()
    {
        return view('services');
    }

    public function showService($id)
    {
        $service = Service::findOrFail($id); // Fetch service by ID
        return view('services', data: compact('service'));
    }
    /**
     * Display Admin Services Page
     */
    public function show()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Store a New Service
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expertise' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'service_name' => $request->service_name,
            'image' => $imagePath,
            'expertise' => $request->expertise,
        ]);

        return redirect()->route('adminservices.index')->with('success', 'Service added successfully!');
    }


    /**
     * Toggle Service Status
     */
    public function toggleStatus(Service $service)
    {
        $service->status = $service->status === 'active' ? 'not_active' : 'active';
        $service->save();

        return redirect()->route('adminservices.index')->with('success', 'Status updated successfully!');
    }

    /**
     * Edit a Service
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update an Existing Service
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expertise' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        $service->update([
            'service_name' => $request->service_name,
            'image' => $service->image,
            'expertise' => $request->expertise,
        ]);

        return redirect()->route('adminservices.index')->with('success', 'Service updated successfully!');
    }


    /**
     * Delete a Service
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete('public/' . $service->image); // Optionally delete the image file
        }

        $service->delete();

        return redirect()->route('adminservices.index')->with('success', 'Service deleted successfully!');
    }

    public function storeservicerequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'service_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        ServiceRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'service_id' => $request->service_id,
            'service_id' => $request->service_id,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Request submitted successfully!');
    }
}
