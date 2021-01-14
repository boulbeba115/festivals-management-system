<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Spectacles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectacles', function (Blueprint $table) {
            $table->increments('idSpec');
            $table->string('nomSpec');
            $table->string('typeSpec');
            $table->time('tempDebSpec');
            $table->time('tempFinSpec');
            $table->string('imgSpec');
            $table->integer('artist_idArt');
            $table->integer('soire_idSoi');
            $table->timestamps();
            $table->unique(['artist_idArt','soire_idSoi']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spectacles');
    }
}
