<?php

use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            'name' => 'cheval1',
            'description' => 'un cheval blanc',
            'sexe' => 'femelle',
            'age' => 10,
            'pound' => 5.5,
            'height' => 10,
            'race_id' => 1
        ]);

        DB::table('animals')->insert([
            'name' => 'chien1',
            'description' => 'un chien blanc',
            'sexe' => 'male',
            'age' => 9,
            'pound' => 6.5,
            'height' => 11,
            'race_id' => 2
        ]);

        DB::table('animals')->insert([
            'name' => 'chat2',
            'description' => 'un chat blanc',
            'sexe' => 'femelle',
            'age' => 7,
            'pound' => 7.5,
            'height' => 12,
            'race_id' => 3    
        ]);
    }
}
