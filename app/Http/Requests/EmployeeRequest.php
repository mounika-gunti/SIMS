<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'whatsapp_number' => 'nullable|string|max:15',
            'address' => 'required|string',
            'designation_id' => 'required|integer|exists:designations,id',
            'branch_id' => 'required|integer|exists:branches,id',
            'aadhar_number' => 'required|string',
            'aadhar_attach_link' => 'nullable',
            'pan_number' => 'required|string|max:10',
            'pan_attach_link' => 'nullable',
            'bank_name' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'ifsc' => 'required|string|max:11',
            'account_no' => 'required|string|max:20',
            'emergency_contact_name' => 'required|string',
            'emergency_contact_phone_number' => 'required|string',
            'emergency_contact_relationship' => 'required|string',
        ];
    }
}
