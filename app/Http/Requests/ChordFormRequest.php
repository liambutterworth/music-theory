<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChordFormRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        if ($this->getMethod() === 'POST') {
            $this->getValidatorInstance()->setRules([
                'name' => 'required',
                'abbr' => 'required',
                'formula' => 'required',
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'abbr' => 'string',
            'formula' => 'string',
        ];
    }
}
