<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Enrollment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();

        if($user != null){
            if ($user->role == 'teacher') {
                // If the user is a teacher, show only their classes
                $classes = Classroom::where('teacher_id', $user->id)->get();
            } elseif ($user->role == 'student') {
                // If the user is a student, show the classes they are enrolled in
                $classes = Classroom::whereHas('enrollments', function($query) use ($user) {
                    $query->where('student_id', $user->id);
                })->get();
            } 
        }

        return view('classes.classes_home_page', compact('classes'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
            Here's a breakdown of why separating them works:

            Validation: The validate method processes only the fields that are part of the request payload. For example, 
            if teacher_id were included in the validation rules, it would expect it to be part of the request data, 
            which can lead to issues or security concerns.

            Data Assignment: After validation, you can safely modify or add additional fields like teacher_id. 
            This ensures that the data being passed to the model for creation is complete and accurate.
        */

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['teacher_id'] = Auth::id(); 
        $validatedData['created_at'] = now(); 

        // Create the classroom
        Classroom::create($validatedData);

        return redirect()->route('classes.index')->with('success', 'Classroom Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classroom = Classroom::with('teacher', 'students')->findOrFail($id);
        
        $assignments = $classroom->assignments ?? []; 
        $posts = Post::where('classroom_id', $id)->with('user')->get();
        
        return view('classes.show', compact('classroom', 'assignments','posts'));
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
    public function destroy(int $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return redirect()->route('classes.index')->with('success','classroom deleted succefully');


    }
}
