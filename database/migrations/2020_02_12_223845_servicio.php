<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicio extends Migration
{
    public function up()
    {
        Schema::create('Servicio', function (Blueprint $table) {
            $table->bigIncrements('id_servicio');
            $table->time('duracion');
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
        Schema::dropIfExists('Servicio');

    }
}
