<?php

namespace App\Domain\Theory\Data;

class ScaleData
{
    public function __construct(
        public string $name,
        public ?array $intervals = null,
    ) {}
}
