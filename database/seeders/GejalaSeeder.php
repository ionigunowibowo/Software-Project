<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejala = array(
            'Elektrik startrer tidak bisa',
            'ISS (idling stop system) tidak berfungsi',
            'Laju kendaran tersendat',
            'Kurang tenaga',
            'Pengapian tidak stabil',
            'Boros bahan bakar',
            'Kendaraan tidak hidup',
            'Getaran berlebih',
            'Timbul suara ketika jalan',
            'Malfunction pada mode & reset',
            'Limbung',
            'Tidak stabil saat digunakan',
            'Ban aus sebagian',
            'Roda belakang berputar berat',
            'Stang bengkok',
            'Stang oblag/kendor',
            'Ergonomi berkurang'
        );

        foreach ($gejala as $nama) {
            gejala::create([
                'nama' => $nama
            ]);
        }
    }
}
