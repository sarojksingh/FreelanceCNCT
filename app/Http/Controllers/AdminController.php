<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all(); // or any other logic to retrieve users

        // Pass the users data to the view
        return view('Admin.dashboard', compact('users'));
    }

    public function editUser($userId)
    {
        // Find the user by ID or use a different way to retrieve the user.
        $user = User::find($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}
