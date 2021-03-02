<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScalesTable extends Migration
{
    public function up()
    {
        Schema::create('scales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('formula');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scales');
    }
}
