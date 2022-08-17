<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function departament(){
        return $this->hasOne(Departament::class, 'departament_id');
    }

    public function teacher(){
        return $this->belongsToMany(Teacher::class, 'teacher_subjects','teacher_id','subject_id');
    }

    public function course(){
        return $this->belongsToMany(Course::class, 'course_subjects','course_id','subject_id');
    }

    public function student(){
        return $this->belongsToMany(Student::class, 'student_subjects','student_id','subject_id');
    }

    public function subject_logs(){
        return $this->belongsToMany(StudentLog::class, 'subject_logs','student_log_id','subject_id');
    }
}
