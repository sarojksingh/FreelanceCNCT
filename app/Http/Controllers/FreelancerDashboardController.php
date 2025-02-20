<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class FreelancerDashboardController extends Controller
{
    public function index()
    {
        // Fetch all projects related to the authenticated user (or adjust based on your needs)
        $projects = Project::where('user_id', Auth::id())->get();

        // Pass the projects to the view
        return view('dashboard', compact('projects'));
    }
}

