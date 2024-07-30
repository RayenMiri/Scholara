@extends('layouts.app')

@section('content')
<div class="flex justify-center min-h-screen bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-4">
        <!-- Welcome Message -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white p-4 text-xl font-semibold">
                {{ __('Dashboard') }}
            </div>
            <div class="p-6">
                <p class="text-gray-700 text-lg">
                    {{ __('You are logged in!') }}
                </p>
            </div>
        </div>

        <!-- Additional Content -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ __('Recent Activities') }}
                </h2>
                <p class="text-gray-700 mt-2">
                    {{ __('Here you can view your recent activities and updates.') }}
                </p>
                <!-- Example content, replace with dynamic content -->
                <ul class="mt-4 space-y-2">
                    <li class="bg-gray-100 p-4 rounded-lg">
                        <p class="text-gray-800">Activity 1</p>
                        <p class="text-gray-600 text-sm">Description of activity 1</p>
                    </li>
                    <li class="bg-gray-100 p-4 rounded-lg">
                        <p class="text-gray-800">Activity 2</p>
                        <p class="text-gray-600 text-sm">Description of activity 2</p>
                    </li>
                    <!-- Add more activities as needed -->
                </ul>
            </div>
        </div>

        <!-- Additional Sections -->
        <!-- You can add more sections here such as recent posts, notifications, etc. -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ __('Your Profile') }}
                </h2>
                <p class="text-gray-700 mt-2">
                    {{ __('Manage your profile and settings.') }}
                </p>
                
            </div>
        </div>
    </div>
</div>
@endsection
