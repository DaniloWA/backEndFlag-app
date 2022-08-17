<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function departament(){
        return $this->hasOne(Departament::class, 'departament_id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'teacher_subjects','teacher_id','subject_id');
    }

    public function lessons(){
        return $this->belongsToMany(Lesson::class, 'teacher_lessons','teacher_id','lesson_id');
    }
}
