<?php

namespace App\Domain\Theory\Data;

class ChordSymbolData
{
    public function __construct(
        public string $full,
        public string $root,
        public string $chord,
        public ?string $inversion = null,
    ) {}
}
