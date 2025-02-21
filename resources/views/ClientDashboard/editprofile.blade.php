<!-- resources/views/client/profile/edit.blade.php -->
@extends('layouts.secondary')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-purple-600 mb-6">Edit Profile</h2>

        <form action="{{ route('client.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $client->name) }}" class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 rounded-md" required>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $client->email) }}" class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 rounded-md" required>
            </div>

            <!-- Location Field -->
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium">Location</label>
                <input type="text" name="location" value="{{ old('location', $client->location) }}" class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 rounded-md">
            </div>

            <!-- Profile Image Field -->
            <div class="mb-4">
                <label for="profile_image" class="block text-gray-700 font-medium">Profile Image</label>
                <!-- Display current image if exists -->
                @if ($client->profile_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $client->profile_image) }}" alt="Profile Image" class="w-24 h-24 rounded-full object-cover">
                    </div>
                @endif
                <input type="file" name="profile_image" class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 rounded-md">
            </div>

            <div class="flex justify-center space-x-4">
                <!-- Submit Button -->
                <button type="submit" class="bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-300">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
@endsection
