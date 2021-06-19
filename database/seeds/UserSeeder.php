<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
      
        DB::table('users')->insert(
            array(
            'role_id' => '1',
            'nombre' => 'Rashel',
            'apellido' => 'Alvarez',
            'email' => 'rashelalvarez21@gmail.com',
          /*   Hash::make($data['password'])
            bcrypt('123456') */
            'password' => Hash::make('123456'),
            'razon_social' => 'Rashel Alvarez',
            'rif' => 'J2153620',
            'telefono' => '04244473798',
            'direccion' => 'Urb Ricardo Urriera Sector 03 AV 01',
            'vendedor_id' => '',
            'file' => 'mortadela.png',
            ));
    }
}
