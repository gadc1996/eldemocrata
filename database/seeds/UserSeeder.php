<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
