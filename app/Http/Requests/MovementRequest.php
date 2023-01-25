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

            'user_id.required'              => ['attribute' => 'user_id', 'message' => Constants::REQUIRED],
            'user_id.uuid'                  => ['attribute' => 'user_id', 'message' => Constants::UUID],
            'user_id.string'                => ['attribute' => 'user_id', 'message' => Constants::STRING],
            'user_id.exists'                => ['attribute' => 'user_id', 'message' => Constants::EXISTS],

            'category_id.required'          => ['attribute' => 'category_id', 'message' => Constants::REQUIRED],
            'category_id.numeric'           => ['attribute' => 'category_id', 'message' => Constants::NUMERIC],
            'category_id.exists'            => ['attribute' => 'category_id', 'message' => Constants::EXISTS],

            'type_id.required'              => ['attribute' => 'type_id', 'message' => Constants::REQUIRED],
            'type_id.numeric'               => ['attribute' => 'type_id', 'message' => Constants::NUMERIC],
            'type_id.exists'                => ['attribute' => 'type_id', 'message' => Constants::EXISTS],

            'payment_method_id.required'    => ['attribute' => 'payment_method_id', 'message' => Constants::REQUIRED],
            'payment_method_id.numeric'     => ['attribute' => 'payment_method_id', 'message' => Constants::NUMERIC],
            'payment_method_id.exists'      => ['attribute' => 'payment_method_id', 'message' => Constants::EXISTS],

            'description.required'          => ['attribute' => 'description', 'message' => Constants::REQUIRED],
            'description.max'               => ['attribute' => 'description', 'message' => Constants::MAX_LENGTH],
            'description.string'            => ['attribute' => 'description', 'message' => Constants::STRING],

            'value.required'                => ['attribute' => 'value', 'message' => Constants::REQUIRED],
            'value.numeric'                 => ['attribute' => 'value', 'message' => Constants::NUMERIC],

            'due_date.required'             => ['attribute' => 'due_date', 'message' => Constants::REQUIRED],
            'due_date.date'                 => ['attribute' => 'due_date', 'message' => Constants::DATE],

            'payment_date.date'             => ['attribute' => 'payment_date', 'message' => Constants::DATE]
        ];
    }
}
