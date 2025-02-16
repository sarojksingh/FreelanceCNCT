<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://example.com/your-background-image.jpg');">
        <div class="bg-black bg-opacity-70 rounded-lg shadow-lg p-8 w-[600px]">

            <!-- Account Type Selection -->
            <h2 class="text-2xl font-bold text-center text-white mb-4">Choose Account Type</h2>
            <div class="flex justify-center mb-6 space-x-4">
                <label class="flex flex-col items-center cursor-pointer">
                    <input type="radio" name="account_type" value="freelancer" class="hidden peer" checked>
                    <img alt="Freelancer illustration"
                         class="mb-2 border-2 border-gray-300 rounded-full p-1 transition-colors duration-200 peer-checked:border-blue-500"
                         height="100" width="100"
                         src="https://storage.googleapis.com/a1aa/image/eJSdx50MVn8GOpZrfxsnerPk6eRx0-xT1VfMFEvxQ2w.jpg">
                    <span class="text-sm font-medium transition-colors duration-200 peer-checked:text-blue-500 text-white">Freelancer</span>
                </label>
                <label class="flex flex-col items-center cursor-pointer">
                    <input type="radio" name="account_type" value="client" class="hidden peer">
                    <img alt="Client illustration"
                         class="mb-2 border-2 border-gray-300 rounded-full p-1 transition-colors duration-200 peer-checked:border-blue-500"
                         height="100" width="100"
                         src="https://storage.googleapis.com/a1aa/image/tLywGWOqfwi-L289uhrAYSkj5kQvYRjFI461Q7gQiE0.jpg">
                    <span class="text-sm font-medium transition-colors duration-200 peer-checked:text-blue-500 text-white">Client</span>
                </label>
            </div>

            <!-- Login Form Header -->
            <h2 class="text-3xl font-bold text-center text-white mb-6">{{ __('LOGIN') }}</h2>
            <h3 class="text-lg text-center text-gray-300 mb-4">{{ __('Welcome User!') }}</h3>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Username')" class="text-white" />
                    <div class="relative">
                        <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md p-2"
                                      type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <div class="relative">
                        <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md p-2"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
                        <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 text-white">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-gray-200" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md ml-3">
                        {{ __('Sign In') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-white">Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
