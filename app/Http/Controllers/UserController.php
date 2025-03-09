<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display the list of users (clients/freelancers)
    public function index()
    {
        // Fetch users from the database
        $users = User::all(); // or any other logic you need

        return view('admin.users.index', compact('users'));
    }

    // Show user details
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Show the form to edit the user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user details
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}

