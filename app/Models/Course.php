<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function departament(){
        return $this->hasOne(Departament::class, 'departament_id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'course_subjects','course_id','subject_id');
    }
}
