<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'street' => ['required'],
            'street-number' => ['required'],
            'cover-photo' => ['required'],
            'phone' => ['required'],
            'neighborhood_id' => ['required', 'integer'],
            'map' => ['required'],
            'website' => ['required'],
            'description' => ['required'],
            'cover' => ['required'],
            'certificate' => ['required'],
            'social-networks' => ['required', 'array', 'min:1'],
            'schedules' => ['required', 'array', 'min:1'],
            'terms' => ['required'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // Social Networks
        if ($this->input('social-facebook')) {
            $this->merge([
                'social-networks' => [
                    'facebook' => [
                        'name' => 'Facebook',
                        'url' => $this->input('social-facebook'),
                    ],
                ],
            ]);
        }
        if ($this->input('social-instagram')) {
            $this->merge([
                'social-networks' => [
                    'facebook' => [
                        'name' => 'Instagram',
                        'url' => $this->input('social-instagram'),
                    ],
                ],
            ]);
        }
        if ($this->input('social-tiktok')) {
            $this->merge([
                'social-networks' => [
                    'facebook' => [
                        'name' => 'Tiktok',
                        'url' => $this->input('social-tiktok'),
                    ],
                ],
            ]);
        }

        // Schedules
        if ($this->input('monday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => $this->input('monday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('monday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'monday' => [
                        'day' => 'monday',
                        'closing-time' => $this->input('monday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('tuesday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => $this->input('tuesday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('tuesday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'tuesday' => [
                        'day' => 'tuesday',
                        'closing-time' => $this->input('tuesday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('wednesday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => $this->input('wednesday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('wednesday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'wednesday' => [
                        'day' => 'wednesday',
                        'closing-time' => $this->input('wednesday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('thursday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => $this->input('thursday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('thursday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'thursday' => [
                        'day' => 'thursday',
                        'closing-time' => $this->input('thursday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('friday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => $this->input('friday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('friday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'friday' => [
                        'day' => 'friday',
                        'closing-time' => $this->input('friday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('saturday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => $this->input('saturday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('saturday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'saturday' => [
                        'day' => 'saturday',
                        'closing-time' => $this->input('saturday-closing-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('sunday-opening-time')) {
            $this->merge([
                'schedules' => [
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => $this->input('sunday-opening-time'),
                    ],
                ],
            ]);
        }
        if ($this->input('sunday-closing-time')) {
            $this->merge([
                'schedules' => [
                    'sunday' => [
                        'day' => 'sunday',
                        'closing-time' => $this->input('sunday-closing-time'),
                    ],
                ],
            ]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }
}
