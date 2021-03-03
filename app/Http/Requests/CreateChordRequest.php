<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChordRequset extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'abbr' => 'required|string',
            'formula' => 'required|string',
        ];
    }
}
