<?php

namespace App\Domain\Theory\Data;

class ChordData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $root,
        public array $intervals,
        public array $notes,
        public ?string $inversion = null,
    ) {}
}
