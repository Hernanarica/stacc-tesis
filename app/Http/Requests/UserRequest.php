<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
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
			'name'     => ['required'],
			'lastname' => ['required'],
			'email'    => ['required', 'unique:users'],
			'category' => ['required'],
			'password' => ['required', 'min:4'],
		];
	}
	
	public function messages(): array
	{
		return [
			'name.required'     => 'El nombre es obligatorio',
			'lastname.required' => 'El apellido es obligatorio',
			'email.required'    => 'El email es obligatorio',
			'email.unique'      => 'El email ya existe',
			'category.required' => 'La categoria es obligatoria',
			'password.required' => 'La contrasena es obligatorio',
			'password.min'      => 'La contrasena debe tener como minimo 4 caracteres',
		];
	}
}