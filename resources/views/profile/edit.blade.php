<x-app-layout>
    <div class="flex h-screen">
        <!-- Main Content -->
        <div class="flex-grow p-6 overflow-y-auto">
            <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
                {{ __('Edit Profile') }}
            </h2>
            <div class="space-y-6">
                <!-- Profile Image Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8">
                    <h3 class="text-2xl font-semibold" style="color: #7F55E0; margin-bottom: 24px;">Profile Image</h3>
                    <div class="max-w-xl mx-auto text-center">
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"
                            class="w-32 h-32 rounded-full mx-auto mb-4">
                        <form action="{{ route('profile.update-image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="profile_image">
                            <button type="submit"
                                class="mt-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-blue-700">Update
                                Image</button>
                        </form>

                    </div>
                </div>

                <!-- Update Profile Information Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8">
                    <h3 class="text-2xl font-semibold" style="color: #7F55E0; margin-bottom: 24px;">Update Profile
                        Information</h3>
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8">
                    <h3 class="text-2xl font-semibold" style="color: #7F55E0; margin-bottom: 24px;">Update Password</h3>
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Skills -->
                    <div>
                        <label for="skills" class="block font-medium text-sm text-gray-700">Skills</label>
                        <input id="skills" name="skills" type="text" class="form-input w-full"
                            value="{{ old('skills', auth()->user()->skills) }}">
                        @error('skills')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Experience -->
                    <div class="mt-4">
                        <label for="experience" class="block font-medium text-sm text-gray-700">Experience</label>
                        <textarea id="experience" name="experience" class="form-input w-full">{{ old('experience', auth()->user()->experience) }}</textarea>
                        @error('experience')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Budget -->
                    <div class="mt-4">
                        <label for="project_budget" class="block font-medium text-sm text-gray-700">Project
                            Budget</label>
                        <input id="project_budget" name="project_budget" type="text" class="form-input w-full"
                            value="{{ old('project_budget', auth()->user()->project_budget) }}"
                            placeholder="Starting from $500 or 500 - 1000 USD">
                        @error('project_budget')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="mt-4">
                        <label for="location" class="block font-medium text-sm text-gray-700">Location</label>
                        <input id="location" name="location" type="text" class="form-input w-full"
                            value="{{ old('location', auth()->user()->location) }}">
                        @error('location')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Update
                            Profile</button>
                    </div>
                </form>

                <!-- Delete Account Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8">
                    <h3 class="text-2xl font-semibold" style="color: #7F55E0; margin-bottom: 24px;">Delete Account</h3>
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
