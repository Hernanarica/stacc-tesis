<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['required'],
            'password' => ['required', 'min:4'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El campo email es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres',
        ];
    }
}
