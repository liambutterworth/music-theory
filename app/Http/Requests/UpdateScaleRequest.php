<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'formula' => 'string',
        ];
    }
}
