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
            $table->bigInteger('cod_exis')->unsigned();
            $table->foreign('cod_exis')->references('id')->on('libroexistencia');

            $table->bigInteger('cod_afiliado')->unsigned();
            $table->foreign('cod_afiliado')->references('id')->on('afiliado');
            $table->dateTime('fecha_prestamo');
            $table->dateTime('fecha_entrega');
            

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
