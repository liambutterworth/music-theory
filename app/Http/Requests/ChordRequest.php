<?php

namespace App\Http\Requests\ChordRequest;

use Illuminate\Foundation\Http\FormRequest;

class ChordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'root' => 'string',
        ];
    }
}
