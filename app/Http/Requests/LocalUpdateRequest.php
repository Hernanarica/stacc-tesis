<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
            'street' => ['required', 'min:2'],
            'street-number' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'neighborhood_id' => ['required'],
            'map' => ['required'],
            'website' => ['required'],
            'description' => ['required', 'min:5'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 2 caracteres',
            'street.required' => 'La calle es requerida',
            'street.min' => 'La calle debe tener al menos 2 caracteres',
            'street-number.required' => 'El número de calle es requerido',
            'street-number.numeric' => 'El número de calle debe ser un número',
            'phone.required' => 'El teléfono es requerido',
            'phone.numeric' => 'El teléfono debe ser un número',
            'neighborhood_id.required' => 'El barrio es requerido',
            'map.required' => 'El mapa es requerido',
            'website.required' => 'El sitio web es requerido',
            'description.required' => 'La descripción es requerida',
            'description.min' => 'La descripción debe tener al menos 5 caracteres',
        ];
    }
}
