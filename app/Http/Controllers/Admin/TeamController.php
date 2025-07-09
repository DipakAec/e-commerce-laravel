<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;   // Import the Team model
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {   
        $teams = Team::orderBy('order', 'asc')->paginate(10);

        return view('admin.teams.index', compact('teams'));
    }


    public function create()
{
    return view('admin.teams.create');
}

public function store(Request $request)
{
    // Validate the form input
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'bio' => 'nullable|string',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'order' => 'nullable|integer',
        'status' => 'nullable|in:active,inactive',
    ]);

    $team = new Team();
    $team->name = $request->name;
    $team->position = $request->position;
    $team->email = $request->email;
    $team->bio = $request->bio;
    $team->facebook = $request->facebook;
    $team->twitter = $request->twitter;
    $team->linkedin = $request->linkedin;
    $team->order = $request->order ?? 0;
    $team->status = $request->status ?? 'active';

    // Handle image upload
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = Str::slug($request->name) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/teams'), $imageName);
        $team->photo = $imageName;
    }

    $team->save();

    return redirect()->route('teams.index')->with('success', 'Team member added successfully!');
}


public function show($id)
{
    $team = Team::findOrFail($id);  // Find team member or throw 404 if not found
    return view('admin.teams.show', compact('team'));
}


public function edit($id)
{
    $team = Team::findOrFail($id);
    return view('admin.teams.edit', compact('team'));
}

public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);

    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'bio' => 'nullable|string',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'order' => 'nullable|integer',
        'status' => 'required|in:active,inactive',
    ]);

    // Update fields
    $team->name = $request->name;
    $team->position = $request->position;
    $team->email = $request->email;
    $team->bio = $request->bio;
    $team->facebook = $request->facebook;
    $team->twitter = $request->twitter;
    $team->linkedin = $request->linkedin;
    $team->order = $request->order;
    $team->status = $request->status;

    // Handle photo upload
    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($team->photo && file_exists(public_path('uploads/teams/' . $team->photo))) {
            unlink(public_path('uploads/teams/' . $team->photo));
        }

        $file = $request->file('photo');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/teams'), $filename);

        $team->photo = $filename;
    }

    $team->save();

    return redirect()->route('teams.index')->with('success', 'Team member updated successfully!');
}

public function destroy($id)
{
    $team = Team::findOrFail($id);

    // Delete photo from storage if exists
    if ($team->photo && file_exists(public_path('uploads/teams/' . $team->photo))) {
        unlink(public_path('uploads/teams/' . $team->photo));
    }

    // Delete team member from database
    $team->delete();

    return redirect()->route('teams.index')->with('success', 'Team member deleted successfully!');
}
public function toggleStatus(Request $request)
{
    $team = Team::find($request->id);

    if (!$team) {
        return response()->json(['status' => false, 'message' => 'Team member not found.']);
    }

    $team->status = $team->status === 'active' ? 'inactive' : 'active';
    $team->save();

    return response()->json([
        'status' => true,
        'new_status' => $team->status,
        'message' => 'Status updated to ' . ucfirst($team->status)
    ]);
}



}
