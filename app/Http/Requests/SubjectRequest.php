<?php

namespace App\Http\Requests;

use App\Traits\DefaultMessages;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
    public function rules(){
        return [
        'name' => [
            'required',
            'min:3'
        ],
        'workload' => [
            'required'
        ],
        'description' => [
            'required'
        ],
        'num_registered_students' => [
            'required'
        ],
        'departament_id' => [
            'required',
            'exists:departaments,id'
        ],
        ];
    }

    public function messages() {
            $messages = $this->defaultMessage();
            return $messages;
        }
}
