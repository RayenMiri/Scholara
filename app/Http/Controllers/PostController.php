<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $classroom_id)
    {
        /*$posts = Post::where('classroom_id',$classroom_id)->get();
        if($posts){
            return view('classes.show', compact('posts'));
        }else{
            return redirect()->route('classes.show',['id' => $classroom_id])->with('error'," it's all quite now.");
        }*/
    }

    /**
     * add a like to a post.
     */
    public function add_like($post_id)
    {
        $post = Post::findOrFail($post_id);
        $user_id = Auth::id();
        if($post){
            $like = Like::where('user_id',$user_id)->where('post_id',$post_id)->first();
            if($like){
                $like->delete();
                $post->likes_count -= 1;
                $post->save();
            }else{
                Like::create([
                    'user_id' => $user_id,
                    'post_id' => $post_id,
                    'is_like' => true,
                ]);
                $post->likes_count+=1;
                $post->save();
            }
            
        }
        return response()->json(['success' => true, 'likes_count' => $post->likes_count]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', 
            'classroom_id' => 'required|exists:classrooms,id' 
        ]);

        $validate['user_id'] = Auth::id();

        Post::create($validate);

        return redirect()->route('classes.show',['id' => $validate['classroom_id']])->with('success', 'post shared');
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
