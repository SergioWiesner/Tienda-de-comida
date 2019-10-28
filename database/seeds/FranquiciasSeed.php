<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranquiciasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for ($a = 0; $a < 10; $a++) {
            DB::table('franquicias')->insert([
                'nombrefranquicia' => $faker->name,
                'idlocalidad' => rand(1, 4),
                'direccion' => $faker->unique()->address,
                'telefono' => $faker->unique()->phoneNumber
            ]);
        }
    }
}
