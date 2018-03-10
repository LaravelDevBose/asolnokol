<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aboutUs');
            $table->string('houseNo');
            $table->string('roadNo');
            $table->string('block');
            $table->string('policeStation');
            $table->string('district');
            $table->string('postalCode');
            $table->string('phoneNo');
            $table->string('emailAddress');
            $table->tinyInteger('publicationStatus');
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
        Schema::dropIfExists('contact_us_infos');
    }
}
