<?php

namespace App\Http\Requests;

use Illuminate\Http\FormRequest;

class NoteFormRequest extends FormRequest
{
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
