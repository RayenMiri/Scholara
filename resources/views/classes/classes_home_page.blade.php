@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center py-12">
    <div class="w-full max-w-3xl bg-gray dark:bg-gray-800 shadow-md rounded-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center">My Classes</h2>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-400 text-green-700 dark:text-green-300 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 dark:bg-red-900 border border-red-400 text-red-700 dark:text-red-300 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @php
            $role = Auth::user()->role;
        @endphp

        @if($role == 'student')
            <div class="flex flex-col items-center mb-6">
                <form action="{{ route('enrollments.join') }}" method="POST" class="w-full max-w-xs">
                    @csrf
                    <input id="class-id" type="text" class="form-input w-full h-10 border border-gray-300 dark:border-gray-600 rounded-md mb-4 p-2 dark:bg-gray-700 dark:text-gray-100" name="classroom_id" placeholder="Enter Class ID" required autocomplete="class" autofocus>
                    <button type="submit" class="bg-blue-600 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 transition duration-300">
                        Join Class
                    </button>
                </form>
            </div>
        @else
            <div class="flex justify-center mb-6">
                <a href="{{ route('classes.create') }}" class="bg-blue-600 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 transition duration-300 text-center text-decoration-none">
                    Create Class
                </a>
            </div>
        @endif

        <div class="space-y-4">
            @if($classes->isEmpty() && $role == 'teacher')
                <p class="text-gray-700 dark:text-gray-300 text-center">No classes available. Go ahead and create one!</p>
            @else
                @foreach($classes as $class)
                    <a href="{{ route('classes.show', $class->id) }}" class="block text-decoration-none">
                        <div class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-600 transition duration-300">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $class->name }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Teacher: {{ $class->teacher->name ?? 'N/A' }}</p>
                            @if($role == 'teacher')
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 dark:bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-700 dark:hover:bg-red-800 transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
