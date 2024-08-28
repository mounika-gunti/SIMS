<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeMasterRequest extends FormRequest
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
            "first_name" => "required|unique:employees,first_name",
            "phone_number" => "required|numeric",
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:15',
            'image_path' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|'
        ];
    }
}