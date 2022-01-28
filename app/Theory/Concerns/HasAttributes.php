<?php

namespace App\Theory\Concerns;

use Illuminate\Support\Arr;

trait HasAttributes
{
    protected array $attributes = [];

    public static function hydrate(array $list): array
    {
        return array_map(function($attributes) {
            return new static($attributes);
        }, $list);
    }

    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttribute(string $key, mixed $value): void
    {
        Arr::set($this->attributes, $key, $value);
    }

    public function getAttribute(string $key, mixed $default = null): mixed
    {
        return Arr::get($this->attributes, $key, $default);
    }

    public function hasAttribute(string $key): bool
    {
        return Arr::has($this->attributes, $key);
    }

    public function forgetAttribute(string $key): void
    {
        Arr::forget($this->attributes, $key);
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function offsetExists(mixed $offset): bool
    {
        return $this->hasAttribute($offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->getAttribute($offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->setAttribute($offset, $value);
    }

    public function offsetUnset(mixed $offset): void
    {
        $this->forgetAttribute($offset);
    }
}
