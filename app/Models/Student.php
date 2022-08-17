<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function course(){
        return $this->hasOne(Course::class, 'course_id');
    }

    public function lesson(){
        return $this->hasOne(Lesson::class, 'lesson_id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'student_subjects','student_id','subject_id');
    }
}
