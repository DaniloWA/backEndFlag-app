<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Traits\DefaultMessages;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    use DefaultMessages;
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
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'min:3'
            ],
            'last_name' => [
                'required',
                'min:3'
            ],
            'nif' => [
                'required',
                'min:9',
                'max:9',
                "unique:students,nif,'.$this->id.",
            ],
            'status' => [
                'required',
                'boolean'
            ],
            'sex' => [
                'required'
            ],
            'father_full_name' => [
                'required'
            ],
            'mother_full_name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                'unique:students'
            ],
            'phone_num' => [
                'required'
            ],
            'country' =>  [
                'required'
            ],
            'street_name' =>  [
                'required'
            ],
            'postal_code' => [
                'required',
                'min:4'
            ],
            'course_id' => 'exists:courses,id',
        ];
    }

    public function messages() {
            $messages = $this->defaultMessage();
            //$messages['first_name.required'] = 'We need your [ '.Str::upper('name').' ] to continue!'; //Single message example
        return $messages;
    }
}
