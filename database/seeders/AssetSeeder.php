<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'nama_asset' => 'Mobil'
        ]);
        Asset::create([
            'nama_asset' => 'Mesin Cuci'
        ]);
        Asset::create([
            'nama_asset' => 'Motor'
        ]);
        Asset::create([
            'nama_asset' => 'Laptop'
        ]);
        Asset::create([
            'nama_asset' => 'Meja'
        ]);
    }
}
