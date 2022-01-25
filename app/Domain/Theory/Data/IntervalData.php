<?php

namespace App\Domain\Theory\Data;

class IntervalData
{
    public function __construct(
        public string $name,
        public string $abbr,
        public string $degree,
        public int $steps,
        public ?string $id = null,
    ) {}
}
