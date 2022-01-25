<?php

namespace App\Domain\Theory\Data;

class ChordSymbolData
{
    public function __construct(
        public string $full,
        public string $chord,
        public ?string $root = null,
        public ?string $inversion = null,
    ) {}
}
