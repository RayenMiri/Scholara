@extends('layouts.app')


@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
        <div class="bg-gray dark:bg-gray-700 p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2">Course Details</h2>
                <p><strong>Teacher:</strong> {{ $course->teacher->name }}</p>
                <p><strong>Classroom:</strong> {{ $course->classroom->name }}</p>
                @if($course->file_path)
                    <p><strong>Course Material:</strong> <a href="{{ Storage::url($course->file_path) }}" target="_blank" class="text-blue-500 underline">Download</a></p>
                @else
                    <p><strong>Course Material:</strong> No file uploaded.</p>
                @endif
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2">Assignments</h2>
                @if($course->assignments->count())
                    <ul class="list-disc ml-6">
                        @foreach($course->assignments as $assignment)
                            <li>{{ $assignment->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No assignments available.</p>
                @endif
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2">Discussions</h2>
                @if($course->discussions->count())
                    <ul class="list-disc ml-6">
                        @foreach($course->discussions as $discussion)
                            <li>{{ $discussion->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No discussions available.</p>
                @endif
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Back</a>
        </div>
    </div>
@endsection
