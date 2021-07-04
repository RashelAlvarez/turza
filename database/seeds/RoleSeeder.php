<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->truncate();
        $data = [
            ['nombre' => 'Administrador'],
            ['nombre' => 'Operador'],
            ['nombre' => 'Cliente'],
            ['nombre' => 'Vendedor'],
        ];
        DB::table('roles')->insert($data);
    }
}
