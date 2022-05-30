<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'namaMenu' => 'Ayam Goreng',
            'harga' => '10000',
            'kategori' => 'Makanan'
        ]);

        Menu::create([
            'namaMenu' => 'Sanger Dingin',
            'harga' => '15000',
            'kategori' => 'Minuman'
        ]);

    }
}
