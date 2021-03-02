<?php

namespace App\Contracts\Services;

use App\Contracts\Support\Crudable;
use App\Domain\Theory\Collections\ChordCollection;
use App\Domain\Theory\Models\Chord;
use Illuminate\Pagination\LengthAwarePaginator;

interface ChordService extends Crudable
{
    public function all(): ChordCollection;
    public function paginate(): LengthAwarePaginator;
    public function find(int $id): Chord;
    public function create(array $data): Chord;
    public function update(int $id, array $data): Chord;
    public function delete(int $id): Chord;
}
