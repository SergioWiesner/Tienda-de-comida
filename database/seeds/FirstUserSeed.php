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
            'email' => 'admin@unimonito.co',
            'password' => Hash::make('adminunimonito.co'),
            'cedula' => '123456',
            'telefono' => '3203368199',
            'salario' => '15000000000',
            'idfranquicia' => 1,
            'idtipoempleado' => 2,
            'fechainicio' => $fecha->toDateTimeString()
        ]);
        $faker = Faker\Factory::create();
        for ($a = 0; $a < 10; $a++) {
            DB::table('users')->insert([
                'nombre' => $faker->unique()->userName,
                'email' => preg_replace('/@example\..*/', '@unimonito.com',$faker->unique()->companyEmail),
                'password' => Hash::make('unimonito.edu.co'),
                'cedula' => rand(1000,10000),
                'telefono' => $faker->unique()->phoneNumber,
                'salario' => rand(800000, 5000000),
                'idfranquicia' => rand(0, 4),
                'idtipoempleado' => 1,
                'fechainicio' => $faker->unique()->dateTime
            ]);
        }
    }
}
