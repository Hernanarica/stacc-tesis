<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'category' => ['required'],
            'image' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
