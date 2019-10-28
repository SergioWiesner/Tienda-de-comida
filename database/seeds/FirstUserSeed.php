<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FirstUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = new Carbon();
        DB::table('users')->insert([
            'nombre' => 'Admin',
            'email' => 'admin@unimonito.edu.co',
            'password' => Hash::make('adminunimonito.edu.co'),
            'cedula' => '123456',
            'telefono' => '3203368199',
            'salario' => '15000000000',
            'idfranquicia' => 1,
            'idtipoempleado' => 1,
            'fechainicio' => $fecha->toDateTimeString()
        ]);
    }
}
