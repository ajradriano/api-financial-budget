<?php

namespace App\Http\Requests;

use App\Utils\Constants;
use Illuminate\Foundation\Http\FormRequest;

class MovementRequest extends FormRequest
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
            'user_id' => 'required|uuid|string|exists:users,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'type_id' => 'required|numeric|exists:types,id',
            'payment_method_id' => 'required|numeric|exists:payment_methods,id',
            'description' => 'required|string|max:120',
            'value' => 'required|numeric',
            'due_date' => 'required|date',
            'payment_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [

            'user_id.required'              => ['attribute' => 'user_id',           'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'user_id.uuid'                  => ['attribute' => 'user_id',           'message' => Constants::UUID['message'],        'code' => Constants::UUID['code']],
            'user_id.string'                => ['attribute' => 'user_id',           'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],
            'user_id.exists'                => ['attribute' => 'user_id',           'message' => Constants::EXISTS['message'],      'code' => Constants::EXISTS['code']],

            'category_id.required'          => ['attribute' => 'category_id',       'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'category_id.numeric'           => ['attribute' => 'category_id',       'message' => Constants::NUMERIC['message'],     'code' => Constants::NUMERIC['code']],
            'category_id.exists'            => ['attribute' => 'category_id',       'message' => Constants::EXISTS['message'],      'code' => Constants::EXISTS['code']],

            'type_id.required'              => ['attribute' => 'type_id',           'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'type_id.numeric'               => ['attribute' => 'type_id',           'message' => Constants::NUMERIC['message'],     'code' => Constants::NUMERIC['code']],
            'type_id.exists'                => ['attribute' => 'type_id',           'message' => Constants::EXISTS['message'],      'code' => Constants::EXISTS['code']],

            'payment_method_id.required'    => ['attribute' => 'payment_method_id', 'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'payment_method_id.numeric'     => ['attribute' => 'payment_method_id', 'message' => Constants::NUMERIC['message'],     'code' => Constants::NUMERIC['code']],
            'payment_method_id.exists'      => ['attribute' => 'payment_method_id', 'message' => Constants::EXISTS['message'],      'code' => Constants::EXISTS['code']],

            'description.required'          => ['attribute' => 'description',       'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'description.max'               => ['attribute' => 'description',       'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],
            'description.string'            => ['attribute' => 'description',       'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],

            'value.required'                => ['attribute' => 'value',             'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'value.numeric'                 => ['attribute' => 'value',             'message' => Constants::NUMERIC['message'],     'code' => Constants::NUMERIC['code']],

            'due_date.required'             => ['attribute' => 'due_date',          'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'due_date.date'                 => ['attribute' => 'due_date',          'message' => Constants::DATE['message'],        'code' => Constants::DATE['code']],

            'payment_date.date'             => ['attribute' => 'payment_date',      'message' => Constants::DATE['message'],        'code' => Constants::DATE['code']],
        ];
    }
}
