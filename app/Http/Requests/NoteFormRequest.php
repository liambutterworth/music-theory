<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteFormRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        if ($this->getMethod() === 'POST') {
            $this->getValidatorInstance()->setRules([
                'name' => 'required',
                'signature' => 'required',
                'is_natural' => 'required',
                'is_accidental' => 'required',
                'is_flat' => 'required',
                'is_sharp' => 'required',
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'signature' => 'string',
            'is_natural' => 'boolean',
            'is_accidental' => 'boolean',
            'is_flat' => 'boolean',
            'is_sharp' => 'boolean',
        ];
    }
}
