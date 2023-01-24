<?php

namespace App\Http\Requests;

use App\Utils\Constants;
use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|string|max:120',
            'description' => 'nullable|string|max:240',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => ['attribute' => 'NAME', 'message' => Constants::REQUIRED],
            'name.max'              => ['attribute' => 'NAME', 'message' => Constants::MAX_LENGTH],
            'name.string'           => ['attribute' => 'NAME', 'message' => Constants::STRING],

            'description.max'       => ['attribute' => 'DESCRIPTION', 'message' => Constants::MAX_LENGTH],
            'description.string'    => ['attribute' => 'DESCRIPTION', 'message' => Constants::STRING],
        ];
    }
}
