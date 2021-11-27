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
        User::create([
            'id' => 2,
            'name' => 'Javier Corrales',
            'email' => 'javiercorralesmillan@hotmail.com',
            'password' => 'ElDemocrata2020.',
        ]);
        User::create([
            'id' => 3,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'ElDemocrata2020.',
        ]);
    }
}
