<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
        //'uuid' => 'required|unique:courses,uuid,'.$this->id.'',
        //'slug' => 'required',
        'name' => 'required|min:3',
        'workload' => 'required',
        'description' => 'required',
        'num_registered_students' => 'required',
        'departament_id' => 'exists:departaments,id',
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            //'uuid.unique' => 'O uuid do curso já existe!'
        ];
    }
}
