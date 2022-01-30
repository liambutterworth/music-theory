<?php

namespace App\Console\Commands;

use App\Domain\Theory\Actions\ResolveNote;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'theory:test';
    protected $description = 'testing things';

    public function handle()
    {
        dd(ResolveNote::execute('Bx'));
    }
}
