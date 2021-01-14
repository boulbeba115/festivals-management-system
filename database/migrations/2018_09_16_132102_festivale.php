<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Festivale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivales', function (Blueprint $table) {
            $table->increments('idFes');
            $table->string('nomFes');
            $table->integer('tourFes');
            $table->date('dateDebFes');
            $table->date('dateFinFes');
            $table->string('adrFes');
            $table->string('telFes');
            $table->string('mailFes');
            $table->string('coverFesImg');
            $table->string('logoFesImg');
            $table->integer('selectedFes')->default(0);
            $table->timestamps();
            $table->unique(['nomFes','tourFes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivales');
    }
}
