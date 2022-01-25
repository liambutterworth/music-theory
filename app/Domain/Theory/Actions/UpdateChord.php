<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UpdateChord
{
    public function __construct(
        private SyncChordIntervals $syncChordIntervals,
    ) {}

    public function execute(Chord $chord, array $data): Chord
    {
        $validated = Validator::make($data, [
            'name' => 'string',
            'symbol' => 'string',
            'formula' => 'string',
        ])->validated();

        $formula = Arr::pull($validated, 'formula');

        $chord->fill($validated)->save();

        if ($formula) {
            $this->syncChordIntervals->execute($chord, $formula);
        }

        return $chord;
    }
}
