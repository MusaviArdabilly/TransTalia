<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KodePerawatan;
use Illuminate\Database\Seeder;

class KodePerawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Record 1
        KodePerawatan::create([
            'kode' => 'A01',
            'keterangan' => 'Aki',
            'kategori' => 'Barang habis pakai',
        ]);
        // Record 2
        KodePerawatan::create([
            'kode' => 'A02',
            'keterangan' => 'As Roda',
            'kategori' => 'Barang tidak habis pakai',
        ]);
        // Record 3
        KodePerawatan::create([
            'kode' => 'B01',
            'keterangan' => 'Ban',
            'kategori' => 'Barang habis pakai',
        ]);
        // Record 4
        KodePerawatan::create([
            'kode' => 'B02',
            'keterangan' => 'Bearing',
            'kategori' => 'Barang tidak habis pakai',
        ]);
        // Record 5
        KodePerawatan::create([
            'kode' => 'B03',
            'keterangan' => 'Busi',
            'kategori' => 'Barang tidak habis pakai',
        ]);
        // Record 6
        KodePerawatan::create([
            'kode' => 'C01',
            'keterangan' => 'Cylinder Head',
            'kategori' => 'Barang tidak habis pakai',
        ]);
    }
}
