@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-8 mb-40">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Register') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-input w-full h-10 border rounded-md @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input w-full h-10 border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                @error('email')
                    <p class="text-red-500 mt-1 ">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Role') }}</label>
                <select id="role" class="form-select w-full h-10 border rounded-md @error('role') border-red-500 @enderror" name="role" required>
                    <option value="">{{ __('Select a role') }}</option>
                    <option value="teacher">{{ __('Teacher') }}</option>
                    <option value="student">{{ __('Student') }}</option>
                </select>
                
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-input w-full h-10 border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                
                @error('password')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-input w-full h-10 border rounded-md" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
