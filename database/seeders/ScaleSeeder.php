<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateScale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ScaleSeeder extends Seeder
{
    public function run(CreateScale $createScale): void
    {
        $scales = json_decode(File::get('database/data/scales.json'), true);

        foreach ($scales as $scale) {
            $createScale->execute($scale);
        }
    }
}
