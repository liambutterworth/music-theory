<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'abbr' => 'string',
            'formula' => 'string',
        ];
    }
}
