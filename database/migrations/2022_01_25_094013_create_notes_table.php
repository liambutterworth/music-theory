<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('real_name');
            $table->string('raises_to');
            $table->string('lowers_to');
            $table->string('increments_to');
            $table->string('decrements_to');
            $table->boolean('is_real');
            $table->boolean('is_theoretical');
            $table->boolean('is_natural');
            $table->boolean('is_accidental');
            $table->boolean('is_sharp');
            $table->boolean('is_flat');
            $table->boolean('prefers_flats');
            $table->boolean('prefers_sharps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
