<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleDegreesTable extends Migration
{
    public function up()
    {
        Schema::create('scale_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scale_id');
            $table->foreignId('interval_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scale_degrees');
    }
}
