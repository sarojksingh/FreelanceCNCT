<x-guest-layout>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto">
        <!-- Choose Account Type Header -->
        <h2 class="text-center text-xl font-semibold mb-6">
            Choose Account Type
        </h2>
        <!-- Account Type Options -->
        <div class="flex justify-center mb-6 space-x-8">
            <!-- Freelancer Option -->
            <label class="flex flex-col items-center cursor-pointer">
                <input type="radio" name="account_type" value="freelancer" class="hidden peer" checked onclick="document.getElementById('role').value='freelancer'" />
                <img
                    alt="Freelancer illustration"
                    class="mb-2 border-2 border-gray-300 rounded-full p-1 transition-colors duration-200 peer-checked:border-blue-500"
                    height="100" width="100"
                    src="https://storage.googleapis.com/a1aa/image/eJSdx50MVn8GOpZrfxsnerPk6eRx0-xT1VfMFEvxQ2w.jpg"
                />
                <span class="text-sm font-medium transition-colors duration-200 peer-checked:text-blue-500">
                    Freelancer
                </span>
            </label>
            <!-- Client Option -->
            <label class="flex flex-col items-center cursor-pointer">
                <input type="radio" name="account_type" value="client" class="hidden peer" onclick="document.getElementById('role').value='client'" />
                <img
                    alt="Client illustration"
                    class="mb-2 border-2 border-gray-300 rounded-full p-1 transition-colors duration-200 peer-checked:border-blue-500"
                    height="100" width="100"
                    src="https://storage.googleapis.com/a1aa/image/tLywGWOqfwi-L289uhrAYSkj5kQvYRjFI461Q7gQiE0.jpg"
                />
                <span class="text-sm font-medium transition-colors duration-200 peer-checked:text-blue-500">
                    Client
                </span>
            </label>
        </div>

        <!-- Optional: Check Icon -->
        <div class="flex justify-center mb-6">
            <i class="fas fa-check-circle text-blue-500 text-2xl"></i>
        </div>

        <!-- Welcome Message -->
        <p class="text-center text-gray-600 mb-6">
            Hello freelancer!<br/>
            Please fill out the form below to get started
        </p>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Full Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full border border-gray-300 rounded-md p-2" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email Address')" />
                <div class="relative">
                    <x-text-input id="email" name="email" type="email" class="block mt-1 w-full border border-gray-300 rounded-md p-2" :value="old('email')" required autocomplete="username" />
                    <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <div class="relative">
                    <x-text-input id="password" name="password" type="password" class="block mt-1 w-full border border-gray-300 rounded-md p-2" required autocomplete="new-password" />
                    <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full border border-gray-300 rounded-md p-2" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Hidden Role Field -->
            <input type="hidden" name="role" id="role" value="freelancer" />

            <!-- Already have an account? -->
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a class="text-blue-500 hover:underline" href="{{ route('login') }}">
                        {{ __('Log in') }}
                    </a>
                </p>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</x-guest-layout>




{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf

        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Create Your Account') }}</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mb-4">
            <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                {{ __('Already have an account? Log in') }}
            </a>
        </div>

        <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md">
            {{ __('Register') }}
        </x-primary-button>
    </form>
</x-guest-layout> --}}

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
