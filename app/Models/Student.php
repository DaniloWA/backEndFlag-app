<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    /* Table Name */
    protected $table = 'students';

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
        'slug',
        'first_name',
        'last_name',
        'nif',
        'status',
        'sex',
        'father_full_name',
        'mother_full_name',
        'email',
        'phone_num',
        'country',
        'street_name',
        'postal_code',
        'course_id',
    ];

    public function rules(){
        return [
        //'uuid' => 'required|unique:students,uuid,'.$this->id.'',
        //'slug' => 'required',
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'nif' => 'required|unique:students,nif,'.$this->id.'|min:9|max:9',
        'status' => 'required|boolean',
        'sex' => 'required',
        'father_full_name' => 'required',
        'mother_full_name' => 'required',
        'email' => 'required|email|unique:students',
        'phone_num' => 'required',
        'country' => 'required',
        'street_name' => 'required',
        'postal_code' => 'required|min:4',
        'course_id' => 'exists:courses,id',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            //'uuid.unique' => 'O UUID do estudante já existe!'
        ];
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->slug = Str::slug($model->first_name. ' '.$model->last_name);
        });
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id','id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class, 'student_subjects','student_id','subject_id');
    }
}
