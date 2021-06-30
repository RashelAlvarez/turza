<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_pagos')->truncate();
        $data = [
            ['nombre' => 'Contado'],
            ['nombre' => 'Credito'],
     
        ];
        DB::table('tipo_pagos')->insert($data);
    }
    
}
