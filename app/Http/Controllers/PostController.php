<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
