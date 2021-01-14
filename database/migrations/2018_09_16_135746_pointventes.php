<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pointventes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointventes', function (Blueprint $table) {
            $table->increments('idPv');
            $table->string('nomPv');
            $table->string('adrPv');
            $table->integer('telPv');
            $table->integer('faxPv');
            $table->double('pvMapx', 10, 5);	
            $table->double('pvMapy', 10, 5);
            $table->string('pvImg');
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
        Schema::dropIfExists('pointventes');

    }
}
