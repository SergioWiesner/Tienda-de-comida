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
        $this->call(FirstUserSeed::class);
        $this->call(TipoEmpleadoSeed::class);
        $this->call(TipoProductoSeed::class);
        $this->call(localidadeseed::class);
    }
}
