<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departament extends Model
{
    use HasFactory;

    /* Table Name */
    protected $table = 'departaments';

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
    ];

    public function rules(){
        return [
        //'uuid' => 'required|unique:courses,uuid,'.$this->id.'',
        //'slug' => 'required',
        'name' => 'required|min:3',
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

    public function course(){
        return $this->hasMany(Course::class);
    }

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function teacher(){
        return $this->hasMany(Teacher::class);
    }
}
