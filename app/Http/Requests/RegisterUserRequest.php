<?php

namespace App\Http\Requests;

use App\Traits\DefaultMessages;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed'
            ],
            'token_name' => [
                'required'
            ]
        ];
    }

    public function messages() {
            $messages = $this->defaultMessage();
            return $messages;
        }
}
