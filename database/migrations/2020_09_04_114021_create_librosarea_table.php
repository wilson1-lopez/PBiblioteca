<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librosarea', function (Blueprint $table) {
            $table->id();
 
            $table->bigInteger('cod_libro')->unsigned();
            $table->foreign('cod_libro')->references('id')->on('libro');

             
            $table->bigInteger('cod_area')->unsigned();
            $table->foreign('cod_area')->references('id')->on('area');

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
        Schema::dropIfExists('librosarea');
    }
}
