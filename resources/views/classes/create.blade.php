@extends('layouts.app')

@section('content')

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Create a New Classroom</h1>

    <form action="{{ route('classes.store') }}" method="POST" class="bg-gray dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Classroom Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-100">
            @error('name')
                <p class="text-red-500 dark:text-red-300 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-600 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">Create
            Classroom</button>
    </form>
</div>
@endsection
