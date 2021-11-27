<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
        ]);
    }
}
