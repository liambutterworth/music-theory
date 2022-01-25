<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateInterval;
use App\Domain\Theory\Models\Interval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class IntervalSeeder extends Seeder
{
    public function run(CreateInterval $createInterval): void
    {
        $intervals = Interval::all();

        Collection::wrap(
            json_decode(File::get('database/data/intervals.json'), true)
        )->filter(function($interval) use($intervals) {
            return true;
            // return !$intervals->contains('abbr', $interval['abbr']);
        })->each(function($interval) use($createInterval) {
            $createInterval->execute($interval);
        });
    }
}
