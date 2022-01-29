<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Note;
use App\Support\Action;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ResolveNote extends Action
{
    public function handle(string $name): string
    {
        return Cache::get("resolved.notes.$name", function () use ($name) {
            $notes = Note::all();

            if ($notes->contains('name', $name)) {
                return $notes->firstWhere('name', $name);
            }

            $string = Str::of($name)->replace('x', '##');
            $real = $string->match('/[ABDEG]b|[ACDFG]#|[A-G]/');
            $steps = $string->after($real)->matchAll('/([b#])/')->count();
            $flat = $string->contains('b');

            $names = $notes->when($flat, function ($notes) {
                return $notes->preferFlats();
            }, function ($notes) {
                return $notes->preferSharps();
            })->pluck('name');

            $index = $names->search($real);

            if ($flat) {
                $index -= $steps;
            } else {
                $index += $steps;
            }

            return $names->slice($index % $names->count(), 1)->first();
        });
    }
}
