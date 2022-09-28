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
	
	protected function prepareForValidation()
	{
		if (is_string($this->role_id)) {
			$this->merge([
				'role_id' => (int)$this->role_id
			]);
		}
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'name'              => ['required'],
			'lastname'          => ['required'],
			'email'             => ['required', 'unique:users'],
			'role_id'           => ['required'],
			'password'          => ['required', 'min:4'],
		];
	}
	
	public function messages(): array
	{
		return [
			'name.required'     => 'El nombre es obligatorio',
			'lastname.required' => 'El apellido es obligatorio',
			'email.required'    => 'El email es obligatorio',
			'email.unique'      => 'El email ya existe',
			'role_id.required'  => 'El rol es obligatorio',
			'password.required' => 'La contrasena es obligatorio',
			'password.min'      => 'La contrasena debe tener como minimo 4 caracteres',
		];
	}
}