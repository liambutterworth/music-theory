<?php

namespace App\Console\Commands;

use App\Domain\Theory\Support\NoteNameParser;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'theory:test';
    protected $description = 'testing things';

    public function handle()
    {
        dd(NoteNameParser::parse('G##'));
    }
}
