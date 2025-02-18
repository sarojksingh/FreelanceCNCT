<x-guest-layout>
    <div class="w-full max-w-md p-12 bg-black bg-opacity-70 rounded-lg shadow-md text-white">
        <h2 class="text-2xl font-semibold text-center text-400">
            Forgot Password?
        </h2>
        <p class="text-sm text-gray-300 text-center mt-2">
            No problem! Enter your email, and we'll send you a password reset link.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mt-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="mt-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input
                    id="email"
                    class="block w-full px-4 py-2 mt-1 border border-gray-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-300">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-400 hover:underline text-sm">
                Back to Login
            </a>
        </div>
    </div>
</x-guest-layout>
