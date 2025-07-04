<?php

namespace Database\Seeders;

use App\Models\pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 25; $i++) {
            pegawai::create([
                'nama_pegawai' => $faker->name(),
                'nik' => $faker->randomNumber(9),
                'alamat' => $faker->address(),
                'umur' => $faker->numberBetween(18, 50),
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),

            ]);
        }
    }
}
