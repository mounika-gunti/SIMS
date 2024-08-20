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
        $frequency = $this->input('frequency');

        $rules = [
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'frequency' => 'required|in:monthly,quarterly,biannually,annually,onetime',
        ];

        switch ($frequency) {
            case 'monthly':
                $rules['month_name'] = 'required|string';
                $rules['from_day'] = 'required|integer|min:1|max:31';
                $rules['to_day'] = 'required|integer|min:1|max:31';
                break;

            case 'quarterly':
                $rules['quarter_name'] = 'required|string';
                // $rules['from_quarter_month'] = 'required|string';
                // $rules['to_quarter_month'] = 'required|string';
                // $rules['from_quarter_day'] = 'required|integer|min:1|max:31';
                // $rules['to_quarter_day'] = 'required|integer|min:1|max:31';
                $rules['from_day'] = 'required|integer|min:1|max:31';
                $rules['to_day'] = 'required|integer|min:1|max:31';
                break;

            case 'biannually':
                $rules['biannual_name'] = 'required|string|in:first,second';
                // $rules['from_biannual_month'] = 'required|string';
                // $rules['to_biannual_month'] = 'required|string';
                // $rules['from_biannual_day'] = 'required|integer|min:1|max:31';
                // $rules['to_biannual_day'] = 'required|integer|min:1|max:31';
                $rules['from_day'] = 'required|integer|min:1|max:31';
                $rules['to_day'] = 'required|integer|min:1|max:31';
                break;

            case 'annually':
                $rules['annual_from_month'] = 'required|string';
                $rules['annual_to_month'] = 'required|string';
                $rules['annual_from_day'] = 'required|integer|min:1|max:31';
                $rules['annual_to_day'] = 'required|integer|min:1|max:31';
                break;

            case 'onetime':
                $rules['from_date'] = 'required|date';
                $rules['to_date'] = 'required|date|after_or_equal:from_date';
                break;
        }

        return $rules;
    }
}