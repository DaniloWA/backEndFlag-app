<?php

namespace App\Http\Requests;

use App\Traits\DefaultMessages;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        'first_name' => [
            'required',
            'min:3'
        ],
        'last_name' => [
            'required',
            'min:3'
        ],
        'status' => [
            'required',
        ],
        'departament_id' => [
            'exists:departaments,id'
        ],
        ];
    }

    public function messages() {
            $messages = $this->defaultMessage();
            return $messages;
        }
}
