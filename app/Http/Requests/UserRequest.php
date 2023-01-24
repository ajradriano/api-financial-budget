<?php

namespace App\Http\Requests;

use App\Utils\Constants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_type' => 'required|numeric',
            'name' => 'required|string|min:10|max:120',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users', 'email')->ignore($this->id),
                'min:10', 'max:120',
            ],
            'login' => [
                'required',
                'string',
                Rule::unique('users', 'login')->ignore($this->id),
                'min:6',
                'max:120'
            ],
            'photo' => 'nullable|string',
            'last_login' => 'nullable|date',
            'email_verified_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'user_type.required'    => ['attribute' => 'USER_TYPE', 'message' => Constants::REQUIRED],
            'user_type.numeric'     => ['attribute' => 'USER_TYPE', 'message' => Constants::NUMERIC],

            'name.required'         => ['attribute' => 'NAME', 'message' => Constants::REQUIRED],
            'name.min'              => ['attribute' => 'NAME', 'message' => Constants::MIN_LENGTH],
            'name.max'              => ['attribute' => 'NAME', 'message' => Constants::MAX_LENGTH],
            'name.string'           => ['attribute' => 'NAME', 'message' => Constants::STRING],

            'login.required'        => ['attribute' => 'LOGIN', 'message' => Constants::REQUIRED],
            'login.unique'          => ['attribute' => 'LOGIN', 'message' => Constants::UNIQUE],
            'login.min'             => ['attribute' => 'LOGIN', 'message' => Constants::MIN_LENGTH],
            'login.max'             => ['attribute' => 'LOGIN', 'message' => Constants::MAX_LENGTH],
            'login.string'          => ['attribute' => 'LOGIN', 'message' => Constants::STRING],

            'email.required'        => ['attribute' => 'EMAIL', 'message' => Constants::REQUIRED],
            'email.email'           => ['attribute' => 'EMAIL', 'message' => Constants::EMAIL],
            'email.unique'          => ['attribute' => 'EMAIL', 'message' => Constants::UNIQUE],
            'email.min'             => ['attribute' => 'EMAIL', 'message' => Constants::MIN_LENGTH],
            'email.max'             => ['attribute' => 'EMAIL', 'message' => Constants::MAX_LENGTH],

            'last_login.date'       => ['attribute' => 'LAST_LOGIN', 'message' => Constants::DATE],

            'email_verified_at.date'=> ['attribute' => 'EMAIL_VERIFIED_AT', 'message' => Constants::DATE],
        ];
    }
}
