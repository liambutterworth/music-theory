<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class IntervalSeeder extends Seeder
{
    public function run(CreateInterval $createInterval): void
    {
        $intervals = json_decode(File::get('database/data/intervals.json'), true);

        foreach ($intervals as $interval) {
            $createInterval->execute($interval);
        }
    }
}
