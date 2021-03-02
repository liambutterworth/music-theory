<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntervalFormRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        if ($this->getMethod() === 'POST') {
            $this->getValidatorInstance()->setRules([
                'name' => 'required',
                'abbr' => 'required',
                'degree' => 'required',
                'steps' => 'required',
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'abbr' => 'string',
            'degree' => 'string',
            'steps' => 'numeric',
        ];
    }
}
