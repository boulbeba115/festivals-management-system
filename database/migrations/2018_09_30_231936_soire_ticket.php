<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoireTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soire_ticket', function (Blueprint $table) {
            $table->increments('idSt');
            $table->integer('soire_idSoi');
            $table->integer('ticket_idTic');
            $table->float('prixTic');
            $table->integer('nbTicDes');

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
        Schema::dropIfExists('soire_ticket');
    }
}
