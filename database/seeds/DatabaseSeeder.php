<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
            
            $this->call(RoleSeeder::class);
            $this->call(ProductoSeeder::class);
            $this->call(EstadoSeeder::class);
            $this->call(TipoPagoSeeder::class);
            $this->call(UserSeeder::class);
          
    }
}
