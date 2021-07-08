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
            $table->string('partner_name', 20);
            $table->text('partner_description');
            $table->string('partner_category', 20);
            $table->string('partner_contact_person_fname', 20);
            $table->string('partner_contact_person_lname', 20);
            $table->string('partner_email', 20);
            $table->string('partner_mobile_number', 20);
            $table->string('partner_landline_number', 20);
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
