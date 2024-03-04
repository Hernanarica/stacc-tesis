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

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un email válido',
            'password.required' => 'El campo contraseña es requerido',
            'category.required' => 'El campo categoría es requerido',
        ];
    }
}
