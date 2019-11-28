<?php

use Illuminate\Database\Seeder;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert([
            'name' => 'race des chevaux',
            'classification' => 'mamiffaire',
            'lifetime' => 10
        ]);

        DB::table('races')->insert([
            'name' => 'race des chien',
            'classification' => 'mamiffaire',
            'lifetime' => 10
        ]);

        DB::table('races')->insert([
            'name' => 'race des chat',
            'classification' => 'mamiffaire',
            'lifetime' => 10
        ]);
    }
}
