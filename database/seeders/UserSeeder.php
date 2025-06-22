<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Adji Muhamad Zidan',
            'email' => 'adjimuhamadzidan@email.com',
            'password' => Hash::make('admin123')
        ]);

        User::create([
            'name' => 'Beyourself',
            'email' => 'beyourself@email.com',
            'password' => Hash::make('admin123')
        ]);

        User::create([
            'name' => 'admin123',
            'email' => 'admin123email.com',
            'password' => Hash::make('admin123')
        ]);
    }
}
