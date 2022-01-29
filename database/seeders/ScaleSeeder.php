<?php

namespace Database\Seeders;

use App\Domain\Theory\Models\Scale;
use Illuminate\Database\Seeder;

class ScaleSeeder extends Seeder
{
    public function run(): void
    {
        Scale::createMany([
            [ 'name' => 'Major', 'intervals' => '1-2-3-4-5-6-7' ],
            [ 'name' => 'Minor', 'intervals' => '1-2-b3-4-5-b6-b7' ],
        ]);
    }
}
