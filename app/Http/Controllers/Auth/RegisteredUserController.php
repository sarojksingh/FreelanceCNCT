<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:freelancer,client,admin'], // Add 'admin' to role validation
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Store the role
        ]);

        event(new Registered($user));
        Auth::login($user);


        // **Check if the user is an admin**
        if ($user->role === 'admin') {
            // Predefined admin email and ID
            $adminEmail = 'admin@example.com'; // Replace with your admin email
            $adminPassword = 'admin123'; // Replace with your admin password

            // Check if the email and password match the predefined admin credentials
            if ($user->email === $adminEmail && Hash::check($request->password, $adminPassword)) {
                // Redirect to admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // If the credentials don't match, return an error
                return redirect()->back()->withErrors(['email' => 'Admin credentials are incorrect']);
            }
        }

        // **For other users: freelancers and clients**
        if ($user->role === 'freelancer') {
            return redirect()->route('freelancer.dashboard'); // Redirect freelancer
        } else {
            return redirect()->route('client.dashboard'); // Redirect client
        }
    }
}
