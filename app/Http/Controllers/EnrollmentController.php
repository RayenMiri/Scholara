<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Enrollment;
use App\models\Classroom;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{

    /**
     * a student joins a classroom
     */
    public function join(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required'
        ]);
        
        $classroom_id = $request->input('classroom_id');

        $Classroom = Classroom::find($classroom_id);

        if(!$Classroom){
            
            return redirect()->route('classes.index')->with('error', 'The classroom you are trying to join does not exist. Please double-check the ID and try again.');        }

        $student_id = Auth::id();

        $Enrollment = Enrollment::where('student_id',$student_id)->where('classroom_id',$classroom_id)->first();

        if($Enrollment){
            return redirect()->route('classes.index')->with('error','You are already enrolled to this classroom');
        }

        Enrollment::create([
            'student_id' => $student_id,
            'classroom_id' =>$classroom_id
        ]);
        
        return redirect()->route('classes.index')->with('success','You have enrolled to the classroom successfully');
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
