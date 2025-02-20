<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User; // User model where role is defined
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rateFreelancer(Request $request, User $freelancer)
    {
        // Ensure the user is logged in and is a client
        $user = Auth::user();
        if ($user->role !== 'client') {
            return redirect()->back()->with('error', 'Only clients can submit reviews.');
        }

        // Validate the review input
        $request->validate([
            'review' => 'required|string|max:500',  // Ensure review is provided
        ]);

        // Check if the client has already left a review for this freelancer
        $existingReview = Rating::where('user_id', $user->id)
            ->where('freelancer_id', $freelancer->id)
            ->first();

        if ($existingReview) {
            // Update the existing review instead of creating a new entry
            $existingReview->update([
                'review' => $request->review,
            ]);
        } else {
            // Create a new review entry
            Rating::create([
                'user_id' => $user->id,
                'freelancer_id' => $freelancer->id,
                'review' => $request->review,
            ]);
        }

        return redirect()->back()->with('success', 'Your review has been submitted.');
    }
}
