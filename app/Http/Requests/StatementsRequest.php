<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
            'NUM_VEDOM' => 'required|string',
            'GROUP_ID' => 'required|integer',
            'SEMESTER' => 'required|integer|between:-32768,32767',
            'CONTROL_DATE' => 'required|date',
            'CONTROL_ID' => 'required|integer',
            'UCH_GOD' => 'required|integer|between:-32768,32767',
            'DISCIPLINE_ID' => 'required|integer',
            'TEACHER_ID' => 'required|integer',
        ];
    }
}
