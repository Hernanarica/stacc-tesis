<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'address' => ['required', 'min:5'],
            'neighborhood_id' => ['required'],
            'opening_time' => ['required'],
            'closing_time' => ['required'],
            'url_site' => ['required'],
            'url_map' => ['required'],
            'phone' => ['required', 'numeric'],
            'terms' => ['required'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre no puede estar vacío.',
            'name.min' => 'El nombre tiene que tener mas de 2 caracteres',
            'address.required' => 'La dirección no puede estar vacío.',
            'address.min' => 'La dirección no puede ser menor a 5 caracteres.',
            'neighborhood_id.required' => 'El barrio no puede estar vacío. Seleccione uno.',
            'opening_time.required' => 'El horario de apertura no puede estar vacío.',
            'closing_time.required' => 'El horario de cierre no puede estar vacío.',
            'url_site.required' => 'La url sel site no puede estar vacía.',
            'url_map.required' => 'El iframe del mapa no puede estar vacío.',
            'phone.required' => 'El teléfono no puede estar vacío.',
            'phone.numeric' => 'Escribe un número telefónico válido',
            'terms.required' => 'Tiene que aceptar los términos para continuar',
            'image.required' => 'Suba una imagen de su local por favor.',
        ];
    }
}
