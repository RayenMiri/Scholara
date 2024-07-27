@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col items-center py-12">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ $classroom->name }}</h2>
        <p class="text-gray-700 mb-4">Teacher: {{ $classroom->teacher->name ?? 'N/A' }}</p>
        
        
        <!-- Add more details as needed -->
        
        <a href="{{ route('classes.index') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
            Back to Classes
        </a>
    </div>
</div>
@endsection
