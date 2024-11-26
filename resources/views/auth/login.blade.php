<style>
    form {
        max-width: 400px;
        margin: 50px auto;
        background-color: #f9f9f9;
        /* Light background */
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    form label {
        font-size: 14px;
        font-weight: 600;
    }

    form input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    form button {
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #45a049;
        /* Slightly darker green on hover */
    }
</style>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <img src="{{ asset('assets/logo-green.png') }}" alt="" style="width: 8rem; margin:auto;">

    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-bold" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-bold" />
            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 focus:border-green-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-green-600 hover:underline hover:text-green-700"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button
                class="ms-3 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
