<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kerusakan;

class KerusakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kerusakans = [
            ['nama' => 'Aki', 'penyebab' => 'Overcharge, Faktor Usia, Kelebihan Beban', 'solusi' => 'Jika tidak turun dari 12V bisa dicharge, Jika <12V ganti Baru'],
            ['nama' => 'Busi', 'penyebab' => 'Faktor umur (8000km/8 bulan), Kebocoran arus, Salah pemasangan', 'solusi' => 'Ganti Baru'],
            ['nama' => 'Injector', 'penyebab' => 'Usia lebih dari 5 tahun, BBM salah/tercampur air', 'solusi' => 'Dibersihkan, Flash Injector, Ganti baru'],
            ['nama' => 'Roller', 'penyebab' => 'Aus pemakaian (24.000 km/2 tahun), Salah pemasangan, Menambah beban Roller', 'solusi' => 'Ganti baru'],
            ['nama' => 'CVT', 'penyebab' => 'Ada kotoran, Usia komponen', 'solusi' => 'Dilakukan perawatan berkala (24.000 km)'],
            ['nama' => 'ECM (electronic control module)', 'penyebab' => 'Lebih dari 5 tahun, Hubung singkat', 'solusi' => 'Ganti Baru'],
            ['nama' => 'Suspensi', 'penyebab' => 'Faktor beban/jalan', 'solusi' => 'Diperbaiki/ganti baru'],
            ['nama' => 'Roda', 'penyebab' => 'Ban aus, laker oblag', 'solusi' => 'Press roda/ganti baru'],
            ['nama' => 'Gearbox', 'penyebab' => 'Kehabisan oli, Faktor usia >5 tahun', 'solusi' => 'Bongkar dan ganti suku cadang'],
            ['nama' => 'Stang Kemudi', 'penyebab' => 'Pemakaian, Kondisi jalan, Beban pengendara', 'solusi' => 'Press Stang dan arngka depan, Ganti komstir']

        ];

        foreach ($kerusakans as $kerusakan) {
            kerusakan::create($kerusakan);
        }
    }
}
