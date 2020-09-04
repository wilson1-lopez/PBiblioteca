<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Super Root',
            'email' => 'rodrigo@gmail.com',
            'password' => '$2y$10$4w9KrJDA9yjzSM0MAnM2SuBYjx5LYgrau6HSjH3WZ36XMGpRlncQy',
            'created_at' => '2020-08-30 18:19:58.000000'
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$4w9KrJDA9yjzSM0MAnM2SuBYjx5LYgrau6HSjH3WZ36XMGpRlncQy',
            'created_at' => '2020-08-30 22:19:58.000000'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
