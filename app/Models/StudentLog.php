<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
    use HasFactory;

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'subject_logs','student_log_id','subject_id');
    }
}