<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakouts', function (Blueprint $table) {
            $table->id();
            $table->string('breakout_title', 255); 
            $table->string('breakout_fname', 255);
            $table->string('breakout_lname', 255);
            $table->string('breakout_designation', 255);
            $table->string('breakout_filename', 50);
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
        Schema::dropIfExists('breakouts');
    }
}
