<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLog extends Model
{
    use HasFactory;

    /* Table Name */
    protected $table = 'subject_logs';

    /* Primary Key */
    protected $primaryKey = 'id';

    /* Timestamps */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];
    
    public function subjects(){
        return $this->belongsToMany(Subject::class, 'subject_logs','student_log_id','subject_id');
    }
}
