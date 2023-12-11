@extends('layout.authentication-template')
@section('auth-content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1 class="auth-title">Forgot Password</h1>
    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="user_email" type="email" class="form-control form-control-xl" placeholder="Email" name="user_email"
                :value="old('user_email')" required autofocus>
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>

        <x-input-error :messages="$errors->get('user_email')" class="mt-2" />

        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Remember your account? <a href="/login" class="font-bold">Log in</a>
        </p>
    </div>
@endsection
{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="user_email" :value="__('user_email')" />
            <x-text-input id="user_email" class="block mt-1 w-full" type="email" name="user_email" :value="old('user_email')"
                required autofocus />
            <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
