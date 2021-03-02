<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScaleFormRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        if ($this->getMethod() === 'POST') {
            $this->getValidatorInstance()->setRules([
                'name' => 'required',
                'formula' => 'required',
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'formula' => 'string',
        ];
    }
}
