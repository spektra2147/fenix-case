<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class Login extends FormRequest
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
            'deviceToken' => 'required|string|max:500',
        ];
    }
}
