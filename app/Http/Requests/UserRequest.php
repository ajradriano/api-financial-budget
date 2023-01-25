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
            'user_type.required'    => ['attribute' => 'user_type', 'message' => Constants::REQUIRED],
            'user_type.numeric'     => ['attribute' => 'user_type', 'message' => Constants::NUMERIC],

            'name.required'         => ['attribute' => 'name', 'message' => Constants::REQUIRED],
            'name.min'              => ['attribute' => 'name', 'message' => Constants::MIN_LENGTH],
            'name.max'              => ['attribute' => 'name', 'message' => Constants::MAX_LENGTH],
            'name.string'           => ['attribute' => 'name', 'message' => Constants::STRING],

            'login.required'        => ['attribute' => 'login', 'message' => Constants::REQUIRED],
            'login.unique'          => ['attribute' => 'login', 'message' => Constants::UNIQUE],
            'login.min'             => ['attribute' => 'login', 'message' => Constants::MIN_LENGTH],
            'login.max'             => ['attribute' => 'login', 'message' => Constants::MAX_LENGTH],
            'login.string'          => ['attribute' => 'login', 'message' => Constants::STRING],

            'email.required'        => ['attribute' => 'email', 'message' => Constants::REQUIRED],
            'email.email'           => ['attribute' => 'email', 'message' => Constants::EMAIL],
            'email.unique'          => ['attribute' => 'email', 'message' => Constants::UNIQUE],
            'email.min'             => ['attribute' => 'email', 'message' => Constants::MIN_LENGTH],
            'email.max'             => ['attribute' => 'email', 'message' => Constants::MAX_LENGTH],

            'last_login.date'       => ['attribute' => 'last_login', 'message' => Constants::DATE],

            'email_verified_at.date'=> ['attribute' => 'email_verified_at', 'message' => Constants::DATE],
        ];
    }
}
