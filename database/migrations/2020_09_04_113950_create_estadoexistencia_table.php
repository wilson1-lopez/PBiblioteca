<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoexistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadoexistencia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

             
            $table->bigInteger('cod_estado')->unsigned();
            $table->foreign('cod_estado')->references('id')->on('estadoexistencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadoexistencia');
    }
}
