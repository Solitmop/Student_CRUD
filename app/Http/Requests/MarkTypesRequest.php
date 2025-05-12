<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkTypesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ID' => 'integer',
            'MARK_VALUE' => 'required|integer|between:-32768,32767',
            'MARK_NAME' => 'required|string'
        ];
    }
}
