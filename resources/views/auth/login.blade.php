@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8 mb-40">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Login') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input w-full h-10 border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-input w-full h-10 border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center mb-4">
                <input id="remember" type="checkbox" class="form-checkbox text-indigo-600 rounded border-gray-300" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</label>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
