<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            RumahSakit::create([
                'nama' => 'Rumah Sakit ' . $i,
                'alamat' => 'Alamat Rumah Sakit ' . $i,
                'email' => 'rs' . $i . '@example.com',
                'telepon' => '0812345678' . $i,
            ]);
        }
    }
}
