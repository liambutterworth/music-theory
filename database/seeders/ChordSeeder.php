<?php

namespace Database\Seeders;

use App\Domain\Theory\Models\Chord;
use Illuminate\Database\Seeder;

class ChordSeeder extends Seeder
{
    public function run(): void
    {
        Chord::createMany([
            [ 'name' => 'Major',      'symbol' => 'maj', 'intervals' => '1-3-5' ],
            [ 'name' => 'Minor',      'symbol' => 'm',   'intervals' => '1-b3-5' ],
            [ 'name' => 'Diminished', 'symbol' => 'dim', 'intervals' => '1-b3-b5' ],
            [ 'name' => 'Augmented',  'symbol' => 'aug', 'intervals' => '1-3-#5' ],
        ]);
    }
}
