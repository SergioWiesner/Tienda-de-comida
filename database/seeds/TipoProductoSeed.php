<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_producto')->insert([
            'nombre' => 'Normal'
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'A medida'
        ]);
    }
}
