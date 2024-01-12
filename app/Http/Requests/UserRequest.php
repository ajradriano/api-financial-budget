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
            'user_type.required'        => ['attribute' => 'user_type',         'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'user_type.numeric'         => ['attribute' => 'user_type',         'message' => Constants::NUMERIC['message'],     'code' => Constants::NUMERIC['code']],

            'name.required'             => ['attribute' => 'name',              'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'name.min'                  => ['attribute' => 'name',              'message' => Constants::MIN_LENGTH['message'],  'code' => Constants::MIN_LENGTH['code']],
            'name.max'                  => ['attribute' => 'name',              'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],
            'name.string'               => ['attribute' => 'name',              'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],

            'login.required'            => ['attribute' => 'login',             'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'login.unique'              => ['attribute' => 'login',             'message' => Constants::UNIQUE['message']],
            'login.min'                 => ['attribute' => 'login',             'message' => Constants::MIN_LENGTH['message'],  'code' => Constants::MIN_LENGTH['code']],
            'login.max'                 => ['attribute' => 'login',             'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],
            'login.string'              => ['attribute' => 'login',             'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],

            'email.required'            => ['attribute' => 'email',             'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'email.email'               => ['attribute' => 'email',             'message' => Constants::EMAIL['message'],       'code' => Constants::EMAIL['code']],
            'email.unique'              => ['attribute' => 'email',             'message' => Constants::UNIQUE['message'],      'code' => Constants::UNIQUE['code']],
            'email.min'                 => ['attribute' => 'email',             'message' => Constants::MIN_LENGTH['message'],  'code' => Constants::MIN_LENGTH['code']],
            'email.max'                 => ['attribute' => 'email',             'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],

            'last_login.date'           => ['attribute' => 'last_login',        'message' => Constants::DATE['message'],        'code' => Constants::DATE['code']],

            'email_verified_at.date'    => ['attribute' => 'email_verified_at', 'message' => Constants::DATE['message'],        'code' => Constants::DATE['code']],
        ];
    }
}
