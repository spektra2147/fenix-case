<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AuthLogin extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public $validator = null;

    protected function failedValidation(Validator $validator): object
    {
        return $this->validator = $validator;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ];
    }
}
