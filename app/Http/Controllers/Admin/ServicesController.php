<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Admin\Services;


use Illuminate\Http\Request;

class ServicesController extends Controller
{
     public function index()
    {   
        
        $services = Services::orderBy('created_at', 'asc')->paginate(10); // 10 items per page

        return view('admin.services.index', compact('services'));
    }

    public function create()
{
    return view('admin.services.create');
}



public function store(Request $request)
{
    // Validate the form input
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:services,slug',
        'icon' => 'nullable|string|max:255',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'position' => 'nullable|integer',
    ]);

    $service = new Services();
    $service->title = $request->title;
    $service->slug = $request->slug ?? Str::slug($request->title);
    $service->icon = $request->icon;
    $service->description = $request->description;
    $service->meta_title = $request->meta_title;
    $service->meta_description = $request->meta_description;
    $service->status = $request->status;
    $service->position = $request->position ?? 0;

    // Handle banner upload
    if ($request->hasFile('banner')) {
        $banner = $request->file('banner');
        $bannerName = Str::slug($request->title) . '_' . time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('uploads/services'), $bannerName);
        $service->banner = $bannerName;
    }

    $service->save();

    return redirect()->route('services.index')->with('success', 'Service created successfully.');
}




public function edit($id)
{
    $service = Services::findOrFail($id);
    return view('admin.services.edit', compact('service'));
}


    public function destroy($id)
    {
        $services = Services::findOrFail($id);


        // Delete team member from database
        $services->delete();

        return redirect()->route('services.index')->with('success', 'services deleted successfully!');
    }

public function update(Request $request, $id)
{
    $service = Services::findOrFail($id);

    // Validate input, ignoring unique slug for the current record
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
        'icon' => 'nullable|string|max:255',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'position' => 'nullable|integer',
    ]);

    $service->title = $request->title;
    $service->slug = $request->slug ?? Str::slug($request->title);
    $service->icon = $request->icon;
    $service->description = $request->description;
    $service->meta_title = $request->meta_title;
    $service->meta_description = $request->meta_description;
    $service->status = $request->status;
    $service->position = $request->position ?? 0;

    // Handle banner upload
    if ($request->hasFile('banner')) {
        // Delete old banner if exists
        if ($service->banner && file_exists(public_path('uploads/services/' . $service->banner))) {
            unlink(public_path('uploads/services/' . $service->banner));
        }

        $banner = $request->file('banner');
        $bannerName = Str::slug($request->title) . '_' . time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('uploads/services'), $bannerName);
        $service->banner = $bannerName;
    }

    $service->save();

    return redirect()->route('services.index')->with('success', 'Service updated successfully.');
}
public function show($id)
{
    $service = Services::findOrFail($id);
    return view('admin.services.show', compact('service'));
}


    public function toggleStatus(Request $request)
    {
        $services = Services::find($request->id);

        if (!$services) {
            return response()->json(['status' => false, 'message' => 'Team member not found.']);
        }

        $services->status = $services->status === 'active' ? 'inactive' : 'active';
        $services->save();

        return response()->json([
            'status' => true,
            'new_status' => $services->status,
            'message' => 'Status updated to ' . ucfirst($services->status)
        ]);
    }
}
