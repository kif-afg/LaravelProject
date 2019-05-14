<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCastM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ public function up()
{
    Schema::table('casts', function (Blueprint $table) {


        $table->foreign('MoviesId')->references('MoviesId')->on('Movies');
        $table->foreign('ActorsId')->references('ActorId')->on('Actors');

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
