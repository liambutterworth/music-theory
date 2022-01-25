<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateScale;
use App\Domain\Theory\Data\ScaleData;
use App\Domain\Theory\Models\Scale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class ScaleSeeder extends Seeder
{
    public function run(CreateScale $createScale): void
    {
        $scales = Scale::all();

        Collection::wrap(
            json_decode(File::get('database/data/scales.json'), true)
        )->filter(function($scale) use($scales) {
            return !$scales->contains('name', Arr::get($scale, 'name'));
        })->each(function($scale) use($createScale) {
            $createScale->execute(new ScaleData(...$scale));
        });
    }
}
