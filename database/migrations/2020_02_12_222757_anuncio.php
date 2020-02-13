<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anuncio extends Migration
{
    public function up()
    {
        Schema::create('Anuncio', function (Blueprint $table) {
            $table->bigIncrements('id_anuncio');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('url');
            $table->date('publicado');
            $table->boolean('anuncioActivo');
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
        Schema::dropIfExists('Anuncio');

    }
}
