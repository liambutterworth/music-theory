<?php

namespace App\Domain\Theory\Support\Concerns;

use Illuminate\Support\Arr;

trait HasAttributes
{
    protected array $attributes = [];

    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    public function setAttribute(string $key, mixed $value): self
    {
        Arr::set($this->attributes, $key, $value);

        return $this;
    }

    public function getAttribute(string $key, mixed $default = null): mixed
    {
        return Arr::get($this->attributes, $key, $default);
    }
}
