<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DummySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 496; $i++) {
            User::create([
                'name' => 'pengguna' . $i,
                'email' => 'pengguna' . $i . '@email.com',
                'password' => Hash::make('pengguna' . $i)
            ]);
        };
    }
}
