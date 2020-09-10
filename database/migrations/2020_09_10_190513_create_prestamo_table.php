<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_prestamo');
            $table->dateTime('fecha_entrega');
            $table->bigInteger('estadoexistencia_id')->unsigned();
            
            $table->foreign('estadoexistencia_id')->references('id')->on('estadoexistencia');

            $table->bigInteger('afiliado_id')->unsigned();
            
            $table->foreign('afiliado_id')->references('id')->on('afiliado');

            $table->bigInteger('tipoprestamo_id')->unsigned();
            
            $table->foreign('tipoprestamo_id')->references('id')->on('tipoprestamo');

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
        Schema::dropIfExists('prestamo');
    }
}
