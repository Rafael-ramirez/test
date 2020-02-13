<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedor extends Migration
{
    public function up()
    {
        Schema::create('Proveedor', function (Blueprint $table) {
            $table->bigIncrements('id_proveedor');
            $table->string('nombre_pro');
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
        Schema::dropIfExists('Proveedor');

    }
}
