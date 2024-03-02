<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpinionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'user_id' => ['required', 'integer'],
            'local_id' => ['required', 'integer'],
            'score' => ['required', 'integer'],
            'opinion' => ['required'],
            'current_date' => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'current_date' => date('Y-m-d'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
