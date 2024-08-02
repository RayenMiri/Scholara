<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_classroom_courses(string $classroom_id)
    {
        $classroom = Classroom::findOrFail($classroom_id);
        if($classroom){
            $courses = Course::where('classroom_id',$classroom_id);
        }
        return response()->JSON([
            'courses' => $courses
        ]);
    }
    //show a course
    public function show(Course $course)
    {
        $course->load(['teacher', 'classroom', 'assignments', 'discussions']);
        return view('courses.show', compact('course'));
    }

    public function add_course(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,zip',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs('courses', $file->getClientOriginalName(), 'public');

        }

        // Create the course
        $course = new Course();
        $course->title = $request->input('title');
        $course->file_path = $filePath;
        $course->classroom_id = $request->input('classroom_id');
        $course->teacher_id = auth()->id();
        $course->save();

        return response()->json(['success' => true, 'course' => $course]);
    }


    public function delete_course(string $cours_id)
    {   
        /* Delete the file associated with the course
        if ($course->file_path) {
            \Storage::disk('public')->delete($course->file_path);
        }*/
        $course = Course::findOrFail($course_id);

        // Delete the course
        $course->delete();

        return response()->json(['success' => true]);
    }
    
}
