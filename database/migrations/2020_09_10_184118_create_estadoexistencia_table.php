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
            $table->bigInteger('estadolibro_id')->unsigned();
            
            $table->foreign('estadolibro_id')->references('id')->on('estadolibro');
           
            $table->bigInteger('libroexistencia_id')->unsigned();
            
            $table->foreign('libroexistencia_id')->references('id')->on('libroexistencia');
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
        Schema::dropIfExists('estadoexistencia');
    }
}
