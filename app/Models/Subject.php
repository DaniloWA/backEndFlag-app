<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    /* Table Name */
    protected $table = 'subjects';

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
        'uuid',
        'name',
        'slug',
        'workload',
        'description',
        'num_registered_students',
        'departament_id',
    ];

        public function rules(){
        return [
        //'uuid' => 'required|unique:courses,uuid,'.$this->id.'',
        //'slug' => 'required',
        'name' => 'required|min:3',
        'workload' => 'required',
        'description' => 'required',
        'num_registered_students' => 'required',
        'departament_id' => 'exists:departaments,id',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            //'uuid.unique' => 'O uuid do curso já existe!'
        ];
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }

    public function departament(){
        return $this->belongsTo(Departament::class, 'departament_id');
    }

    public function teachers(){
        return $this->hasMany(Teacher::class, 'teacher_subjects','teacher_id','subject_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_subjects','course_id','subject_id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'student_subjects','student_id','subject_id');
    }

    public function subjectLogs(){
        return $this->belongsToMany(StudentLog::class, 'subject_logs','student_log_id','subject_id');
    }
}
