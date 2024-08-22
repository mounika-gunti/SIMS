<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:15',
            'payment_terms' => 'nullable|string|max:255',
            'credit_days' => 'nullable|integer',
            'description' => 'nullable|string',
            'billing_country_id' => 'required|exists:countries,id',
            'billing_state_id' => 'required|exists:states,id',
            'billing_city_id' => 'required|exists:cities,id',
            'billing_address' => 'required|string|max:255',
            'gst_number' => 'required|string|max:15',
            'services' => 'nullable|array',
            'shipping_country_id' => 'nullable|exists:countries,id',
            'shipping_state_id' => 'nullable|exists:states,id',
            'shipping_city_id' => 'nullable|exists:cities,id',
            'shipping_address' => 'nullable|string|max:255',
        ];
    }
}