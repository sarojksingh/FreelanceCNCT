<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientFreelancerController extends Controller
{
    public function index()
    {
        // Query freelancers who have reviews with non-empty review content, and eager load the client data
        $freelancers = User::where('role', 'freelancer')
            ->has('reviews')  // Ensures only freelancers with reviews are included
            ->with(['reviews' => function ($query) {
                // Filter out reviews with empty review text
                $query->whereNotNull('review')->where('review', '!=', '');
            }, 'reviews.client'])  // Eager load the client who posted the review
            ->paginate(12);  // Paginate the results

        // Pass freelancers data to the view
        return view('clientFreelancer.index', compact('freelancers'));
    }
}
