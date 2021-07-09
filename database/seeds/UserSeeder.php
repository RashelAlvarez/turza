<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
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
           /*  'nombre' => 'Rashel',
            'apellido' => 'Alvarez', */
            'email' => 'rashelalvarez21@gmail.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         /*    'razon_social' => 'Rashel Alvarez',
            'rif' => 'J2153620',
            'telefono' => '04244473798',
            'direccion' => 'Urb Ricardo Urriera Sector 03 AV 01',
            'file' => 'mortadela.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), */
            ));
            DB::table('users')->insert(
              array(
                'role_id' => '2',
                /* 'nombre' => 'Juan',
                'apellido' => 'Lozada', */
                'email' => 'juanlozada@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
/*                 'razon_social' => 'Juan Lozada',
                'rif' => 'J12452101',
                'telefono' => '04141254126',
                'direccion' => 'Urb Ricardo Urriera Sector 03 AV 01',
                'file' => 'mortadela.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(), */

              ));
    }
}
