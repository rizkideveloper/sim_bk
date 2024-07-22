<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        Role::create([
            'role' => 'Admin',
        ]);
        Role::create([
            'role' => 'BK',
        ]);
        Role::create([
            'role' => 'Walikelas',
        ]);

        User::create([
            'nip' => '11111111',
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => 12345678
        ]);
    }
}
