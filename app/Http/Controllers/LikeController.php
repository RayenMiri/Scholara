<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller{
public function likePost(Request $request, $post_id)
{
    $post = Post::findOrFail($post_id);
    $user_id = Auth::id();
    

    $like = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
    Log::info('User ID: ' . $user_id);
    if ($like) {
        // If the user has already liked the post, we will remove the like (toggle)
        $like->delete();
    } else {
        // Otherwise, we will add a new like
        Like::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'is_like' => true,
        ]);
    }

    $likeCount = $post->likes->count();

    return response()->json([
        'success' => true,
        'likes_count' => $likeCount,
    ]);
}
}