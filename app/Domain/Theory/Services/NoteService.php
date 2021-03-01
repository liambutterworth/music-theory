<?php

namespace App\Domain\Theory\Services;

use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Data\NoteData;
use App\Domain\Theory\Models\Note;
use App\Domain\Concerns\ManagesModel;
use App\Domain\Concerns\ValidatesData;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class NoteService
{
    use ManagesModel, ValidatesData;

    protected function model(): string
    {
        return Note::class;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'signature' => 'string',
            'is_natural' => 'boolean',
            'is_accidental' => 'boolean',
            'is_flat' => 'boolean',
            'is_sharp' => 'boolean',
        ];
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

    public function all()
    {
        return Note::all()->map(function($note) {
            return NoteData::fromModel($note);
        });
    }

    public function find(int $id): NoteData
    {
        return NoteData::fromModel(Note::find($id));
    }

    public function create(array $data): Note
    {
        $validated = $this->validate($data, [
            'name' => 'required',
            'signature' => 'required',
            'is_natural' => 'required',
            'is_accidental' => 'required',
            'is_flat' => 'required',
            'is_sharp' => 'required',
        ]);

        return Note::create($validated);
    }

    public function update(int $id, array $data): Note
    {
        return tap($this->find($id), function($note) use($data) {
            $note->fill($this->validate($data))->save();
        });
    }

    public function delete(): Note
    {
        return tap($this->find($id), function($note) {
            $note->delete();
        });
    }
}
