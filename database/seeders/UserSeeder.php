<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
                'role'     => 'admin',
                'phone'    => '08111',
                'company'  => 'hogwarts'
            ]
        );

        // Company (login via phone)
        User::updateOrCreate(
            ['phone' => '08222'],
            [
                'name'     => 'Even Hotels',
                'email'    => 'user@example.com',
                'password' => Hash::make('password'), 
                'role'     => 'user',
                'company'  => 'hogwarts'
            ]
        );
    }
}
