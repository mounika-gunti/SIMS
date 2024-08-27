<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
    public function rules()
    {
        $frequency_type = $this->input('frequency_type');

        $rules = [
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'frequency_type' => 'required|in:monthly,quarterly,biannually,annually,onetime',
            'month_name' => 'required|string',
            'deleted_at' => 'nullable|date'
        ];

        return $rules;
    }
}
