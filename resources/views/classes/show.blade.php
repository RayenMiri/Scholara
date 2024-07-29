@extends('layouts.app')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 py-8">
    <div class="w-full bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg p-8 flex space-x-4">
        <!-- Student List (Left) -->
        <div class="w-1/4 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Student List</h3>
            <!-- Search Bar (Optional) -->
            <div class="mb-4">
                <input type="text" placeholder="Search students..." class="form-input w-full h-10 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100" />
            </div>
            <!-- Student List -->
            <ul class="space-y-2">
                @forelse ($classroom->students as $student)
                    <li class="flex items-center space-x-3 bg-gray-100 dark:bg-gray-600 p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-500 transition duration-300">
                        <!-- Avatar Placeholder -->
                        <div class="w-8 h-8 bg-gray-300 dark:bg-gray-500 rounded-full flex items-center justify-center text-gray-800 dark:text-gray-100">
                            <span class="text-xs">{{ strtoupper(substr($student->name, 0, 1)) }}</span>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">{{ $student->name }}</span>
                    </li>
                @empty
                    <li class="text-gray-700 dark:text-gray-300">No students enrolled.</li>
                @endforelse
            </ul>
        </div>

        <!-- Classroom Card (Middle) -->
        <div class="w-2/4 bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center">{{ $classroom->name }}</h2>
            <p class="text-gray-700 dark:text-gray-300 mb-4">Teacher: {{ $classroom->teacher->name ?? 'N/A' }}</p>
            
            <!-- Share a post -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Share a post</h3>
                <form action="{{route('posts.store')}}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}" />
                        <input type="text" name="title" placeholder="Title" class="form-input w-full h-10 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100" />
                    </div>
                    <div>
                        <textarea name="content" placeholder="Content" rows="4" class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 transition duration-300">
                        Post
                    </button>
                </form>
            </div>

            <!-- Existing Posts -->
            <div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Posts</h3>
            <ul class="space-y-4">
                @foreach($posts as $post)
                    <li class="bg-gray-200 dark:bg-gray-700 p-6 rounded-lg shadow-md relative transition-transform duration-300 transform hover:scale-105">
                        <!-- User Info -->
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center text-gray-800 dark:text-gray-100 mr-3">
                                <span class="text-lg font-bold">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span>
                            </div>
                            <div>
                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $post->user->name }}</span>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                        <!-- Post Content -->
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $post->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $post->content }}</p>
                        <!-- Optional: Post Actions -->
                        <div class="flex justify-end space-x-2">
                            <button class="bg-blue-500 text-white py-1 px-3 rounded-lg hover:bg-blue-600 transition duration-300">Like</button>
                            <button class="bg-green-500 text-white py-1 px-3 rounded-lg hover:bg-green-600 transition duration-300">Comment</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        </div>

        <!-- Assignment List (Right) -->
        <div class="w-1/4 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Assignments</h3>
            <ul class="space-y-2">
                @forelse ($assignments as $assignment)
                    <li class="text-gray-700 dark:text-gray-300">{{ $assignment->title }}</li>
                @empty
                    <li class="text-gray-700 dark:text-gray-300">No assignments yet.</li>
                @endforelse
                <!-- Dummy assignments for now -->
                @for ($i = 1; $i <= 5; $i++)
                    <li class="text-gray-700 dark:text-gray-300">Dummy Assignment {{ $i }}</li>
                @endfor
            </ul>
        </div>
    </div>
</div>
@endsection