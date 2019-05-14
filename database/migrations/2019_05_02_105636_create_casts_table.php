<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casts', function (Blueprint $table) {

            $table->bigIncrements('CastId');
            $table->unsignedInteger('MoviesId');
            $table->unsignedInteger('ActorsId');
           // $table->foreign('MoviesId')->references('MoviesId')->on('Movies');
           // $table->foreign('ActorsId')->references('ActorId')->on('Actors');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casts');
    }
}
