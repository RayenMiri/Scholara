<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_comments_belongs_to_post($post_id)
    {   
        $post = Post::findOrFail($post_id);

        if($post){
            $comments = Comment::where('post_id',$post_id)->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function comment(Request $request, Post $post)
{
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->post_id = $post->id;
    $comment->user_id = Auth::id();
    $comment->save();

    return response()->json([
        'success' => true,
        'comment' => [
            'user_initial' => strtoupper(substr(auth()->user()->name, 0, 1)),
            'user_name' => auth()->user()->name,
            'content' => $comment->content,
        ],
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        if($comment){
            $comment->delete();
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
