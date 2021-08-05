<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 150);
            $table->date('event_date');
            $table->text('event_description');
            $table->string('event_speaker_fname', 100)->nullable();
            $table->string('event_speaker_lname', 100)->nullable();
            $table->string('event_category', 100);
            $table->time('event_time')->nullable();
            $table->integer('event_participant')->nullable();
            $table->string('event_filename', 15000);   
            $table->integer('image_counter');
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
        Schema::dropIfExists('events');
    }
}