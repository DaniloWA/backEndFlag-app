<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'slug',
        'departament_id',
        'first_name',
        'last_name',
        'status',
    ];
    public function rules(){
        return [
        'uuid' => 'required|unique:teachers,uuid,'.$this->id.'',
        'slug' => 'required',
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'status' => 'required',
        'departament_id' => 'exists:departaments,id',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'uuid.unique' => 'O uuid do professor já existe!'
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
