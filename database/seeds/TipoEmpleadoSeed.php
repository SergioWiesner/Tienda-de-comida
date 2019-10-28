<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEmpleadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_empleado')->insert([
            'nombre' => 'Empleado'
        ]);
        DB::table('tipo_empleado')->insert([
            'nombre' => 'Gerente'
        ]);
    }
}
