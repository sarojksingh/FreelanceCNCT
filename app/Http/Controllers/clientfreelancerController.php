<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class clientfreelancerController extends Controller
{
    public function index()
    {
        // Query for freelancers (you might want to paginate if there are many)
        $freelancers = User::where('role', 'freelancer')->paginate(12);
        // Load freelancer's reviews along with the user (client) who gave the review
        // $freelancers->load(['reviews.user']);

        // Pass the freelancer data to the view located at clientFreelancer/index.blade.php
        return view('clientFreelancer.index', compact('freelancers'));
    }
}
