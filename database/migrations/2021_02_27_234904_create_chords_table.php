<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordsTable extends Migration
{
    public function up()
    {
        Schema::create('chords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbr');
            $table->string('formula');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chords');
    }
}
