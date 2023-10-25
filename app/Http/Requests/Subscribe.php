<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class Subscribe extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator): object
    {
        return $this->validator = $validator;
    }

    public function rules(): array
    {
        return [
            'deviceToken' => 'required|string|max:500|exists:devices,device_token',
            'productId' => 'required|string|max:255',
            'receiptToken' => 'required|string|max:500',
        ];
    }
}
