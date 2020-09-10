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
            $table->bigInteger('libro_id')->unsigned();
            
            $table->foreign('libro_id')->references('id')->on('libro');

            $table->bigInteger('area_id')->unsigned();
            
            $table->foreign('area_id')->references('id')->on('area');
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
