<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_movie', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('movie_title');
            $table->text('movie_long_description');
            $table->string('movie_release_date');
            $table->tinyInteger('movie_rating')->comment('1-5 rating values fixed');
            $table->string('movie_ticket_price');
            $table->string('movie_country');
            $table->string('movie_genre');
            $table->string('movie_image');
            $table->tinyInteger('status')->comment('0 = Inactive, 1 = Active');
            $table->integer('created_by');
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
        Schema::dropIfExists('tbl_movie');
    }
}
