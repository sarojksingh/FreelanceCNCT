<?php

namespace App\Http\Controllers;

use App\Models\Project;

class FreelancerDashboardController extends Controller
{
    public function index()
    {
        // Fetch all projects related to the authenticated user (or adjust based on your needs)
        $projects = Project::all(); // Adjust if you want to fetch projects by the logged-in user or other conditions

        // Pass the projects to the view
        return view('dashboard', compact('projects'));
    }
}

