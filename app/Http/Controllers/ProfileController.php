<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information, including image.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validate request including image
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            // Store new image in public storage
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Update image path in the database
            $validated['profile_image'] = $imagePath;
        }

        // Update user data
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => ['nullable', 'image', 'max:2048']
        ]);

        $user = $request->user();

        if (!$user) {
            return Redirect::route('profile.edit')->with('error', 'User not found.');
        }

        try {
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('profile_images', 'public');

                // Delete old image if it exists
                if (!empty($user->profile_image) && Storage::disk('public')->exists($user->profile_image)) {
                    Storage::disk('public')->delete($user->profile_image);
                }

                // Update user profile image
                $user->update(['profile_image' => $imagePath]);
            }

            return Redirect::route('profile.edit')->with('status', 'image-updated');
        } catch (\Exception $e) {
            return Redirect::route('profile.edit')->with('error', 'Failed to update profile image. Please try again.');
        }
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete profile image if exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
