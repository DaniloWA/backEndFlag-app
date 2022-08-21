<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /* Table Name */
    protected $table = 'lessons';

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

    public function course(){
        return $this->hasOne(Course::class, 'course_id');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function teachers(){
        return $this->belongsToMany(Lesson::class, 'teacher_lessons','teacher_id','lesson_id');
    }
}
