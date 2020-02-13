<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IPublicable extends Migration
{
    public function up()
    {
        Schema::create('IPublicable', function (Blueprint $table) {
            $table->bigIncrements('id_publicable');
            $table->boolean('anuncioActivo');
            $table->boolean('estaActivo');
            $table->string('getTextoAnuncio');
            $table->string('getURL');
            $table->integer('status');
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
        Schema::dropIfExists('IPublicable');

    }
}
