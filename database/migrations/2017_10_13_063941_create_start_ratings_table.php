<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('productId');
            $table->integer('rating');
            $table->integer('totalRating');
            $table->integer('totalRates');
            $table->text('userId');
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
        Schema::dropIfExists('start_ratings');
    }
}
