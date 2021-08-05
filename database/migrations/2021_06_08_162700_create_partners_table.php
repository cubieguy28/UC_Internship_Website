<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('partner_name', 255);
            $table->text('partner_description');
            $table->string('partner_category', 100);
            $table->string('partner_contact_person_fname', 100)->nullable();
            $table->string('partner_contact_person_lname', 100)->nullable();
            $table->string('partner_email', 100)->nullable();
            $table->string('partner_mobile_number', 100)->nullable();
            $table->string('partner_landline_number', 100)->nullable();
            $table->string('partner_tagline', 255)->nullable();
            $table->string('partner_link', 255)->nullable();
            $table->string('partner_filename', 50);

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
        Schema::dropIfExists('partners');
    }
}
