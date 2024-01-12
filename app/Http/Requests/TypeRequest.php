<?php

namespace App\Http\Requests;

use App\Utils\Constants;
use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
{

    /**
     * Determine if is JSON for /api.
     *
     * @return bool
     */
    public function wantsJson() {
        return true;
    }


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
            'name.required'         => ['attribute' => 'name',          'message' => Constants::REQUIRED['message'],    'code' => Constants::REQUIRED['code']],
            'name.max'              => ['attribute' => 'name',          'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],
            'name.string'           => ['attribute' => 'name',          'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],

            'description.max'       => ['attribute' => 'description',   'message' => Constants::MAX_LENGTH['message'],  'code' => Constants::MAX_LENGTH['code']],
            'description.string'    => ['attribute' => 'description',   'message' => Constants::STRING['message'],      'code' => Constants::STRING['code']],
        ];
    }
}
