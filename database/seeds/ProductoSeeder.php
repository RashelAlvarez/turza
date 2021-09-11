<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->truncate();
      
        DB::table('productos')->insert(
            array(
                'nombre' => 'Mortadela de pollo tipo especial 500gr',
             'descripcion' => 'Bulto de 20 unidades 500 gramos c/u',
          
            'impuesto' => 'No aplica',
            'image' => 'm500gr.png'
            )    );
            DB::table('productos')->insert(
            array(
                'nombre' => 'Mortadela de pollo tipo especial 1kg',
                'descripcion' => 'Bulto de 10 unidades 1kg c/u',
              
                'impuesto' => 'No aplica',
                'image' => 'm1kg.png'
            ));
            DB::table('productos')->insert(
            array(
                'nombre' => 'Salchicha de pollo tipo bologna 1kg',
                'descripcion' => 'Bulto de bologna 10 unidades 1kg c/u',
              
                'impuesto' => '+IVA',
                'image' => 'b1kg.png' 
            ));
    
    }
    
}
