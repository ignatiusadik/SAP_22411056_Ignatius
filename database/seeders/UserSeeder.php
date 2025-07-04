<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\devisi;
use App\Models\perusahaan;


class UserSeeder extends Seeder
{
    public function run()
    {
        $perusahaan = perusahaan::first();
        $devisi = devisi::first();
        // Superadmin tanpa company dan division
        User::create([
            'name' => 'Adi',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'superadmin',
            'perusahaan_id' => null,
            'devisi_id' => null,
            'jenis_kelamin' => null,
            'tanggal_lahir' => null,
        ]);

        // Admin perusahaan
        User::create([
            'name' => 'Admin Perusahaan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'perusahaan_id' => null,
            'devisi_id' => null,
            'jenis_kelamin' => 'laki-laki',
            'tanggal_lahir' => '1998-09-01',
        ]);
    }
}
