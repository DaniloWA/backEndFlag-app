<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function course(){
        return $this->hasOne(Course::class, 'course_id');
    }

    public function teachers(){
        return $this->belongsToMany(Lesson::class, 'teacher_lessons','teacher_id','lesson_id');
    }
}
