<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Demo Admin',
            'email' => 'admin@gmail.com',
            'role' => 'ADMIN',
            'password' => bcrypt('admin'),
        ]);
    }
}
