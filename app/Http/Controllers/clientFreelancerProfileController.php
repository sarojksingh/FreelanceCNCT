<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientFreelancerProfileController extends Controller
{
    public function show($id)
    {
        $freelancer = User::where('id', $id)
            ->where('role', 'freelancer')
            ->with('projects') // Ensure projects are loaded
            ->firstOrFail();

        return view('clientfreelancer.profile', compact('freelancer'));
    }
}
