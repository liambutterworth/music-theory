<?php

namespace App\Domain\Theory\Services;

use App\Contracts\Services\NoteService as Contract;
use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Models\Note;
use Illuminate\Pagination\LengthAwarePaginator;

class NoteService implements Contract
{
    public function all(): NoteCollection
    {
        return Note::all();
    }

    public function paginate(): LengthAwarePaginator
    {
        return Note::paginate();
    }

    public function find(int $id): Note
    {
        return Note::find($id);
    }

    public function create(array $data): Note
    {
        return Note::create($data);
    }

    public function update(int $id, array $data): Note
    {
        return tap($this->find($id), function($note) use($data) {
            $note->fill($data)->save();
        });
    }

    public function delete(int $id): Note
    {
        return tap($this->find($id), function($note) {
            $note->delete();
        });
    }

    public function getKey(int $id): NoteCollection
    {
        $root = $this->find($id);

        if (Str::contains($root->signature, 'b')) {
            return Note::preferFlats()->get()->filterByKey($root->name);
        } else if (Str::contains($root->signature, '#')) {
            return Note::preferSharps()->get()->filterByKey($root->name);
        } else {
            return Note::naturals()->get();
        }
    }
}
