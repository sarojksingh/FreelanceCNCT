<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Fetch all projects
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    // Store a new project
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('projects')->with('success', 'Project created successfully!');
    }

    // Fetch a single project
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    // Show the edit form
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project')); // Return the edit view with project data
    }

    // Update a project
    public function update(Request $request, Project $project)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|max:1024', // Allow image upload if present
        ]);

        // Update project attributes
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = $request->input('status');

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects', 'public');
            $project->image = $image;
        }

        $project->save();

        return redirect()->route('projects', $project->id)->with('success', 'Project updated successfully!');
    }


    // Delete a project
    // app/Http/Controllers/ProjectController.php

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully');
    }
}
