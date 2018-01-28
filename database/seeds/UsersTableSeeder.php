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
            'name' => 'Demo',
            'email' => 'demo@localhost.com',
            'password' => bcrypt('demo'),
        ]);

        DB::table('users')->insert([
            'name' => 'Chee Hau',
            'email' => 'micelittle11@gmail.com',
            'password' => bcrypt('a'),
        ]);
    }
}
