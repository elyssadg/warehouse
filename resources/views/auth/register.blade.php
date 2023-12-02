@extends('layout.authentication-template')
@section('auth-content')
    <h1 class="auth-title">Sign Up</h1>
    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- User Name -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="username" type="text" class="form-control form-control-xl" placeholder="Username" name="username"
                :value="old('username')" required autofocus autocomplete="name" />
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="user_email" type="text" class="form-control form-control-xl" placeholder="Email"
                type="user_email" name="user_email" :value="old('user_email')" required autocomplete="username">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
        </div>

        <!-- DOB -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="dob" type="date" class="form-control form-control form-control-xl flatpickr-range"
                placeholder="Date of Birth" name="dob" required autocomplete="bday">
            <div class="form-control-icon">
                <i class="bi bi-calendar-event"></i>
            </div>
            <x-input-error :messages="$errors->get('dob')" class="mt-2 text-danger" />
        </div>

        <!-- Address -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="address" type="text" class="form-control form-control-xl" placeholder="User Address"
                name="address" required autocomplete="address-level1">
            <div class="form-control-icon">
                <i class="bi bi-house"></i>
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password" type="password" class="form-control form-control-xl" placeholder="Password"
                name="password" required autocomplete="new-password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password_confirmation" type="password" class="form-control form-control-xl"
                placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
                in</a>.</p>
    </div>
@endsection

@section('custom-scripts')
    <script src="dist/assets/static/js/components/dark.js"></script>
    <script src="dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="assets/compiled/js/app.js"></script>



    <script src="dist/assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="dist/assets/static/js/pages/date-picker.js"></script>
@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
