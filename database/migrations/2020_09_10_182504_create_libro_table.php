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
             $table->string('nombre');

            $table->string('isbn');
            $table->string('titulo');
            $table->string('edicion');

              $table->dateTime('fecha');
            $table->bigInteger('editorial_id')->unsigned();
            
            $table->foreign('editorial_id')->references('id')->on('editorial');

            $table->bigInteger('tipolibro_id')->unsigned();
            
            $table->foreign('tipolibro_id')->references('id')->on('tipolibro');

            
            $table->bigInteger('pais_id')->unsigned();
         
            $table->foreign('pais_id')->references('id')->on('pais');
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
        Schema::dropIfExists('libro');
    }
}
