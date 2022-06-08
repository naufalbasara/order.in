<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Meja;
use App\Models\User;
use App\Models\Restoran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        Restoran::create([
            'namaRestoran'=> 'Dapur Kenangan',
            'alamat'=> 'Jalan Kenangan Bersama Dia'
        ]);

        User::create([
            'name'=> 'Naufal Rafiawan Basara',
            'username' => 'naufalbasara',
            'password'=> Hash::make('admin'),
            'isAdmin' => 1
        ]);

    }
}
