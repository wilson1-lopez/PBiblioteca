<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroautorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libroautor', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('cod_libro')->unsigned();
            $table->foreign('cod_libro')->references('id')->on('libro');

            $table->bigInteger('cod_autor')->unsigned();
            $table->foreign('cod_autor')->references('id')->on('autor');

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
        Schema::dropIfExists('libroautor');
    }
}
