<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionProperty;

class Data implements Arrayable, Responsable
{
    public function __construct(array $data)
    {
        $class = new ReflectionClass(static::class);
        $properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);

        // $this->validate($data, $properties);
        $this->populate($data, $properties);
    }

    private function validate(array $data, array $properties): void
    {
        // $rules = [];
        //
        // foreach ($r
    }

    private function populate(array $data, array $properties): void
    {
        foreach ($properties as $property) {
            $name = $property->getName();
            $default = isset($this->$name) ? $this->$name : null;
            $key = Str::snake($name);
            $value = Arr::get($data, $key, $default);
            $setter = Str::camel("set{$name}");

            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } else {
                $this->$name = $value;
            }
        }
    }

    public static function fromArray(array $data): self
    {
        return new static($data);
    }

    public static function fromModel(Model $model): self
    {
        return static::fromArray($model->toArray());
    }

    public static function fromRequest(Request $request): self
    {
        return static::fromArray($request->all());
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toResponse($request): JsonResponse
    {
        $data = Arr::add([], 'data', $this->toArray());
        $status = JsonResponse::HTTP_OK;

        return new JsonResponse($data, $status);
    }
}
