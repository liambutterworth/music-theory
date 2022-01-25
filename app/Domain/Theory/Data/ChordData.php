<?php

namespace App\Domain\Theory\Data;

class ChordData
{
    public function __construct(
        public string $name,
        public string $symbol,
        public string|null $id = null,
        public array|null $intervals = null,
        public array|null $notes = null,
        public string|null $root = null,
        public string|null $inversion = null,
    ) {}
}
