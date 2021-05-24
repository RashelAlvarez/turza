<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddforeignPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedidos', function (Blueprint $table) {
            //
            
            $table->foreign('user_id')->references('id')->on('users');
            
             
            $table->foreign('nro_orden')->references('id')->on('item_pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pedidos', function (Blueprint $table) {
            //
            $table->dropForeign('pedidos_user_id_foreign');
            $table->dropForeign('pedidos_nro_orden_foreign');
        });


    }
}
