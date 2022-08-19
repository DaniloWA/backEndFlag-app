<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'workload',
        'description',
        'num_registered_students',
        'departament_id',
    ];

    public function departament(){
        return $this->hasOne(Departament::class, 'departament_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_subjects','teacher_id','subject_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_subjects','course_id','subject_id');
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_subjects','student_id','subject_id');
    }

    public function subjectLogs(){
        return $this->belongsToMany(StudentLog::class, 'subject_logs','student_log_id','subject_id');
    }
}
