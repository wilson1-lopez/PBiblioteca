<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');

            $table->string('isbn');
            $table->string('titulo');
            $table->string('edicion');

              $table->dateTime('fecha');
            $table->bigInteger('cod_edit')->unsigned();
            $table->foreign('cod_edit')->references('id')->on('editorial');

            $table->bigInteger('cod_tlibro')->unsigned();
            $table->foreign('cod_tlibro')->references('id')->on('tipo_libro');

            
            $table->bigInteger('cod_pais')->unsigned();
            $table->foreign('cod_pais')->references('id')->on('pais');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
