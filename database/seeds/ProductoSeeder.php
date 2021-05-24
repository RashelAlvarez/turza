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
            'precio' => '18.00',
            'impuesto' => 'No aplica',
            'image' => 'mortadela5.png'
            )    );
            DB::table('productos')->insert(
            array(
                'nombre' => 'Mortadela de pollo tipo especial 1kg',
                'descripcion' => 'Bulto de 10 unidades 1kg c/u',
                'precio' => '18.00',
                'impuesto' => 'No aplica',
                'image' => 'mortadela4.png'
            ));
            DB::table('productos')->insert(
            array(
                'nombre' => 'Salchicha de pollo tipo bologna 1kg',
                'descripcion' => 'Bulto de bologna 10 unidades 1kg c/u',
                'precio' => '22.00',
                'impuesto' => '+IVA',
                'image' => 'bologna4.png' 
            ));
    
    }
    
}
