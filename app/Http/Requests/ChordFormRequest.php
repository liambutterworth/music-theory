<?php

namespace App\Http\Requests;

use Illuminate\Http\FormRequest;

class ChordFormRequest extends FormRequest
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
