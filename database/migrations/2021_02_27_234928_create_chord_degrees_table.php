<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordDegreesTable extends Migration
{
    public function up()
    {
        Schema::create('chord_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chord_id');
            $table->foreignId('interval_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chord_degrees');
    }
}
