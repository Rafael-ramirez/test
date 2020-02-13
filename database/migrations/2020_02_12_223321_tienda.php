<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tienda extends Migration
{
    public function up()
    {
        Schema::create('Tienda', function (Blueprint $table) {
            $table->bigIncrements('id_tienda');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
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
        Schema::dropIfExists('Tienda');

    }
}
