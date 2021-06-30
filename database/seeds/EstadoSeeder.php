<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estado')->truncate();
      
        DB::table('estado')->insert(
            array(
            'nombre' => 'Pendiente',
      
        ));
        DB::table('estado')->insert(
        array(
            'nombre' => 'Entregado',
    
        ));
          



    }
}
