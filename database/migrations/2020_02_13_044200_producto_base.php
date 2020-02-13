<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoBase extends Migration
{
    public function up()
    {
        Schema::create('ProductoBase', function (Blueprint $table) {
            $table->bigIncrements('id_producto_base');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio')->nullable();
            $table->date('publicado')->nullable();
            $table->date('anuncioActivo')->nullable();
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
        Schema::dropIfExists('ProductoBase');

    }
}
