<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class localidadeseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidades')->insert([
            'nombrelocalidad' => 'No tiene'
        ]);
        DB::table('localidades')->insert([
            'nombrelocalidad' => 'Norte'
        ]);
        DB::table('localidades')->insert([
            'nombrelocalidad' => 'Sur'
        ]);
        DB::table('localidades')->insert([
            'nombrelocalidad' => 'Este'
        ]);
        DB::table('localidades')->insert([
            'nombrelocalidad' => 'Oeste'
        ]);
    }
}
