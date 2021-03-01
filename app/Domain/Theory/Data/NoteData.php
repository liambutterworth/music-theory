<?php

namespace App\Domain\Theory\Data;

use App\Support\Data;

class NoteData extends Data
{
    public int $id;
    public string $name;
    public string $signature;
    public bool $isNatural;
    public bool $isAccidental;
    public bool $isFlat;
    public bool $isSharp;
}
