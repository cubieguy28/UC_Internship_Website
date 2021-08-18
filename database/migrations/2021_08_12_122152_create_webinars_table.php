<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->date('webinar_date');
            $table->string('webinar_title', 255); 
            $table->time('webinar_time'); 
            $table->string('webinar_link', 255); 
            $table->string('webinar_id', 255); 
            $table->string('webinar_code', 255); 
            $table->string('speaker_fname', 255);
            $table->string('speaker_lname', 255);
            $table->string('speaker_designation', 255);
            $table->string('speaker_filename', 50);
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
        Schema::dropIfExists('webinars');
    }
}
