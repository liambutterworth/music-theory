<?php

namespace App\Http\Requests;

use Illuminate\Http\FormRequest;

class IntervalFormRequest extends FormRequest
{
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
