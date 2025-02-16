<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class clientFreelancerProfileController extends Controller
{
    public function show($id)
    {
        // Retrieve the freelancer's details (ensure they have the 'freelancer' role)
        $freelancer = User::where('id', $id)
                          ->where('role', 'freelancer')
                          ->firstOrFail();

        // Return the view from the clientfreelancer folder
        return view('clientfreelancer.profile', compact('freelancer'));
    }
}
