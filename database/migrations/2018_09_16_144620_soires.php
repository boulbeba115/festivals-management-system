<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Soires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soires', function (Blueprint $table) {
            $table->increments('idSoi');
            $table->string('nomSoi');
            $table->date('dateSoi');
            $table->mediumText('desSoi');
            $table->string('ImgSoi');
            $table->integer('festivale_idFes');
            $table->integer('scene_idScene');
            $table->timestamps();
            $table->unique(['nomSoi','festivale_idFes']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soires');
    }
}
