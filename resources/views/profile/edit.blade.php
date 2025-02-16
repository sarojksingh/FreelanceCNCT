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
                                <button type="submit" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-blue-700">Update Image</button>
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
