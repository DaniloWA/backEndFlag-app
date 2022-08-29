<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
        //'uuid' => 'required|unique:teachers,uuid,'.$this->id.'',
        //'slug' => 'required',
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'status' => 'required',
        'departament_id' => 'exists:departaments,id',
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            //'uuid.unique' => 'O uuid do professor já existe!'
        ];
    }
}
