<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rumahSakitIds = RumahSakit::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            Pasien::create([
                'nama' => 'Pasien ' . $i,
                'alamat' => 'Alamat Pasien ' . $i,
                'telepon' => '0812345678' . $i,
                'id_rumah_sakit' => $rumahSakitIds[array_rand($rumahSakitIds)],
            ]);
        }
    }
}
