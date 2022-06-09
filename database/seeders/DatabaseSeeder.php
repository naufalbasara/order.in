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
            'kategori' => 'Makanan',
            'gambar' => 'https://selerasa.com/wp-content/uploads/2015/12/images_daging_ayam-goreng-1200x720.jpg'
        ]);

        Menu::create([
            'namaMenu' => 'Sanger Dingin',
            'harga' => '15000',
            'kategori' => 'Minuman',
            'gambar' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/4760a654-d7b7-453c-bd35-d475c34f039d_Go-Biz_20210615_224403.jpeg'
        ]);

        Meja::create([
            'nomor_meja'=> 1
        ]);

        User::create([
            'name'=> 'Naufal Rafiawan Basara',
            'username' => 'naufalbasara',
            'password'=> Hash::make('admin'),
            'isAdmin' => 1
        ]);

        Restoran::create([
            'namaRestoran'=> 'Dapur Kenangan',
            'alamat' => 'Jalan Kenangan Bersama Dia'
        ]);

    }
}
