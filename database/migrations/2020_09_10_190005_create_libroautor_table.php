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

            $table->bigInteger('libro_id')->unsigned();
            
            $table->foreign('libro_id')->references('id')->on('libro');

            $table->bigInteger('autor_id')->unsigned();
            
            $table->foreign('autor_id')->references('id')->on('autor');


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
