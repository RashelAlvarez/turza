<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
           /*  $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('nro_orden');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('total');
            $table->string('estado');
            $table->timestamps(); */


            $table->id();
            $table->integer('user_id');        
            $table->integer('nro_orden');
            /* $table->integer('id_itempedidos'); */
            $table->decimal('sub_total');
            $table->integer('estado');
            $table->integer('tipopago_id');
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
        Schema::dropIfExists('pedidos');
    }
}
