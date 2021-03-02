<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervalsTable extends Migration
{
    public function up()
    {
        Schema::create('intervals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbr');
            $table->string('degree');
            $table->integer('steps');
        });
    }

    public function down()
    {
        Schema::dropIfExists('intervals');
    }
}
