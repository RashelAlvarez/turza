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
            
            $table->integer('role_id')->nullable();
            $table->string('nombre');
            $table->string('apellido');

            $table->string('email')->unique();
          
            $table->string('password');
            $table->string('razon_social')->unique();
            $table->string('rif')->unique();
            $table->string('telefono');
            $table->text('direccion');
            $table->integer('vendedor_id')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('users');
    }
}
