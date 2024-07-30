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
                        <input type="text" name="title" required placeholder="Title" class="form-input w-full h-10 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100" />
                    </div>
                    <div>
                        <textarea name="content" required placeholder="Content" rows="4" class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100"></textarea>
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
                @if(count($posts) == 0)
                    <p class="text-[14px]">It's all quiet now. Be the first one who shares a post!</p>
                    <img src="/img/no_posts_illus.png" alt="no_posts_illus" class="">
                @endif
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
                        <!-- Post Actions -->
                        <div class="flex justify-between items-center">
                            <button onclick="toggleComments({{ $post->id }})" class="bg-gray-500 text-white py-1 px-3 rounded-lg hover:bg-gray-600 transition duration-300">
                                Comments ({{ $post->comments->count() }})
                            </button>
                            <button onclick="like_post({{ $post->id }})" class="bg-blue-500 text-white py-1 px-3 rounded-lg hover:bg-blue-600 transition duration-300">
                                <span id="likes-count-{{ $post->id }}" class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span>{{ $post->likes_count }}</span>
                                </span>
                            </button>
                        </div>

                        <!-- Comment Input and Button -->
                        <div id="comments-section-{{ $post->id }}" class="mt-4 hidden">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Comments</h5>
                            <ul id="comment-list-{{ $post->id }}" class="space-y-2">
                                @foreach ($post->comments as $comment)
                                    <li class="bg-gray-300 dark:bg-gray-600 p-4 rounded-md">
                                        <div class="flex items-center mb-2">
                                            <div class="w-8 h-8 bg-gray-400 dark:bg-gray-500 rounded-full flex items-center justify-center text-gray-800 dark:text-gray-100 mr-2">
                                                <span class="text-sm font-bold">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                                            </div>
                                            <span class="text-gray-800 dark:text-gray-200">{{ $comment->user->name }}</span>
                                        </div>
                                        <div class="">
                                
                                        </div>
                                        <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="flex items-center space-x-2 mt-4">
                                <input id="comment-input-{{ $post->id }}" type="text" placeholder="Add a comment..." class="form-input w-full h-10 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-gray-100" />
                                <button onclick="postComment({{ $post->id }})" class="bg-blue-500 text-white py-1 px-3 rounded-lg hover:bg-blue-600 transition duration-300">Comment</button>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>

        <!-- Courses List (Right) -->
        <div class="w-1/4 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Courses</h3>
            <ul class="space-y-2">
                @forelse ($classroom->courses as $course)
                    <li class="flex items-center space-x-3 bg-gray-100 dark:bg-gray-600 p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-500 transition duration-300">
                        <span class="text-gray-700 dark:text-gray-300">{{ $course->name }}</span>
                    </li>
                @empty
                    <li class="text-gray-700 dark:text-gray-300">No courses available.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
<script>

//toggle comments section
function toggleComments(postId) {
    var commentsSection = document.getElementById('comments-section-' + postId);
    if (commentsSection.classList.contains('hidden')) {
        commentsSection.classList.remove('hidden');
    } else {
        commentsSection.classList.add('hidden');
    }
}

//like a post 
function like_post(post_id) {
    fetch(`/posts/${post_id}/like`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const likes_count_span = document.getElementById(`likes-count-${post_id}`);
            likes_count_span.querySelector('span').textContent = data.likes_count; 
           
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

//submit a comment
function postComment(postId) {
    const commentInput = document.getElementById(`comment-input-${postId}`);
    const commentContent = commentInput.value.trim();
    if (commentContent === '') return; // Ignore empty comments

    fetch(`/posts/${postId}/comment`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ content: commentContent })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Append new comment to the list
            const commentList = document.getElementById(`comment-list-${postId}`);
            const newComment = document.createElement('li');
            newComment.classList.add('bg-gray-300', 'dark:bg-gray-600', 'p-4', 'rounded-md');
            newComment.innerHTML = `
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 bg-gray-400 dark:bg-gray-500 rounded-full flex items-center justify-center text-gray-800 dark:text-gray-100 mr-2">
                        <span class="text-sm font-bold">${data.comment.user_initial}</span>
                    </div>
                    <span class="text-gray-800 dark:text-gray-200">${data.comment.user_name}</span>
                </div>
                <p class="text-gray-700 dark:text-gray-300">${data.comment.content}</p>
            `;
            commentList.appendChild(newComment);

            // Clear input field
            commentInput.value = '';
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

</script>

