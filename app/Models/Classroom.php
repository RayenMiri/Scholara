<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'teacher_id', // Add teacher_id to mass assignable attributes
    ];

    /**
     * Get the teacher of the classroom.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the students enrolled in the classroom.
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'classroom_id', 'student_id');
    }

    /**
     * Get the courses for the classroom.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
