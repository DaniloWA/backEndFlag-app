<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLog extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsToMany(Subject::class, 'subject_logs','student_log_id','subject_id');
    }
}
