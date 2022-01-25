<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use ReflectionProperty;

abstract class DataTransferObject
{
    public static function fromArray(array $data): self
    {
        return new static(...$data);
    }

    public function fill(Model $model): Model
    {
        $reflection = new ReflectionClass(static::class);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        $attributes = [];

        foreach ($properties as $property) {
            if ($property->isInitialized($this)) {
                $fillable[$property->getName()] = $property->getValue();
            }
        }

        $model->fill($attributes);

        return $model;
    }
}
