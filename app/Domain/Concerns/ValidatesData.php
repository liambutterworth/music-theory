<?php

namespace App\Domain\Concerns;

use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

trait ValidatesData
{
    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    public function validator(array $data): Validator
    {
        return ValidatorFacade::make($data, $this->rules(), $this->messages());
    }

    public function validate(array $data, array $extra = []): array
    {
        $validator = $this->validator($data);

        if (!empty($extra)) {
            $validator->setRules($extra);
        }

        return $validator->validate();
    }
}

