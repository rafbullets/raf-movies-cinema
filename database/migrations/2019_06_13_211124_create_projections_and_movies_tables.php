<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionsAndMoviesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('cinema_hall_id');
            $table->dateTime('start_at');
            $table->double('ticket_price');
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('genre');
            $table->integer('length');
            $table->timestamps();
        });

        Schema::create('cinema_halls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hall_name');
            $table->integer('number_of_rows');
            $table->integer('seats_in_row');
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
        Schema::dropIfExists('projections');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('cinema_halls');
    }
}
