<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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

    //	Solo para postman
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 403));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:2'],
            'comment' => ['required', 'min:20'],
        ];
    }

    /**
     * The messages() function returns an array of messages that are used to display validation errors
     *
     * @return array []
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El titulo es obligatorio',
            'title.min' => 'El titulo debe tener minimo 2 caracteres',
            'comment.required' => 'El comentario es obligatorio',
            'comment.min' => 'El comentario debe tener minimo 20 caracteres',
        ];
    }
}
