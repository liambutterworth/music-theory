<?php

namespace App\Http\Requests;

use Illuminate\Http\FormRequest;

class ScaleFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'formula' => 'string',
        ];
    }
}
