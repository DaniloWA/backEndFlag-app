<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
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
        'departament_id',
    ];

    public function rules(){
        return [
        'uuid' => 'required|unique:courses,uuid,'.$this->id.'',
        'slug' => 'required',
        'name' => 'required|min:3',
        'departament_id' => 'exists:departaments,id',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'uuid.unique' => 'O uuid do curso já existe!'
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
        return $this->hasOne(Departament::class, 'departament_id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'course_subjects','course_id','subject_id');
    }
}
