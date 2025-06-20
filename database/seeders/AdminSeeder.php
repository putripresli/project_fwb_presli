<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    
        public function run(): void
    {
        // Admin
        User::create([
            'name' => 'pelanggan',
            'email' => 'pelanggan@contoh.com',
            'password' => Hash::make('1234567'),  // password default
            'role' => 'pelanggan',
        ]);
}
}
