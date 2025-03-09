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
            return redirect()->back()->with('error', 'Only clients can rate freelancers.');
        }

        // The field name will dynamically change for each freelancer
        $ratingField = 'rating_' . $freelancer->id;

        // Validate the rating input (should be between 1 and 5)
        $request->validate([
            $ratingField => 'required|integer|between:1,5', // Validate the specific rating
            'review' => 'nullable|string|max:500',
        ]);

        // Check if the client has already rated this freelancer
        $existingReview = Rating::where('user_id', $user->id)
            ->where('freelancer_id', $freelancer->id)
            ->first();

        if ($existingReview) {
            // If the rating already exists, update it with the new rating and review
            $existingReview->update([
                'rating' => $request->$ratingField,  // Update the rating
                'review' => $request->review,       // Update the review (optional)
            ]);
            return redirect()->back()->with('success', 'Your rating has been updated.');
        } else {
            // If no rating exists, create a new one
            Rating::create([
                'user_id' => $request->user()->id,  // The authenticated user
                'freelancer_id' => $freelancer->id,  // The freelancer being rated
                'rating' => $request->$ratingField,  // Access the dynamic rating field
                'review' => $request->review,       // The review value from the form (optional)
            ]);
            return redirect()->back()->with('success', 'Your rating has been submitted.');
        }
    }







    public function reviewFreelancer(Request $request, User $freelancer)
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
