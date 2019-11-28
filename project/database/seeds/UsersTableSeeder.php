<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'b',
            'email' => 'b@b.com',
            'password' => bcrypt('789456123'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'c',
            'email' => 'c@c.com',
            'password' => bcrypt('123456789'),
            'role_id' => 2
        ]);
    }
}
