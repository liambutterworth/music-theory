<?php

namespace App\Contracts\Services;

use App\Contracts\Support\Crudable;
use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Models\Note;
use Illuminate\Pagination\LengthAwarePaginator;

interface NoteService extends Crudable
{
    public function all(): NoteCollection;
    public function paginate(): LengthAwarePaginator;
    public function find(int $id): Note;
    public function create(array $data): Note;
    public function update(int $id, array $data): Note;
    public function delete(int $id): Note;
}
