<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Fetch all projects for the authenticated user
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    // Store a new project with multiple images
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:1024', // Only allow specific image types
        ]);

        // Store the project in the database
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => Auth::id(), // Assign the project to the authenticated user
        ]);

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store the image in the 'projects' directory in storage/public
                $imagePath = $image->store('projects', 'public');

                // Save the image path in the database
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('projects')->with('success', 'Project created successfully!');
    }

    // Fetch a single project (only if it belongs to the authenticated user)
    public function show($id)
    {
        $project = Project::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($project);
    }

    // Show the edit form (only for the authenticated user's project)
    public function edit($id)
{
    $project = Project::where('id', $id)
        ->where('user_id', Auth::id())
        ->with('images') // Load related images
        ->firstOrFail();

    return view('projects.edit', compact('project'));
}

    // Update a project with multiple images
    public function update(Request $request, $id)
{
    $project = Project::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
    ]);

    // Update project details
    $project->name = $request->input('name');
    $project->description = $request->input('description');
    $project->status = $request->input('status');
    $project->save();

    // Handle image updates
    if ($request->hasFile('images')) {
        // Delete old images
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image); // Remove from storage
            $image->delete(); // Remove from DB
        }

        // Store new images
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('projects', 'public');
            ProjectImage::create([
                'project_id' => $project->id,
                'image' => $imagePath,
            ]);
        }
    }

    return redirect()->route('projects')->with('success', 'Project updated successfully!');
}

    // Delete a project (only if it belongs to the authenticated user)
    public function destroy($id)
    {
        $project = Project::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Delete associated images
        $project->images()->delete();

        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully');
    }
}
