<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pegawai;
use App\Models\Alamat;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Record 1
        Alamat::create([
            'id' => intval('1'),
            'kota_id' => intval('244'),
            'distrik_id' => intval('3627'),
            'desa_id' => intval('45100'),
        ]);
        Pegawai::create([
            'user_id' => intval('2'),
            'alamat_id' => intval('1'),
            'jabatan' => 'mekanik',
            'jumlah_order' => intval('0'),
        ]);
        // Record 2
        Alamat::create([
            'id' => intval('2'),
            'kota_id' => intval('244'),
            'distrik_id' => intval('3627'),
            'desa_id' => intval('45102'),
        ]);
        Pegawai::create([
            'user_id' => intval('4'),
            'alamat_id' => intval('2'),
            'jabatan' => 'sopir',
            'jumlah_order' => intval('0'),
        ]);
        // Record 3
        Alamat::create([
            'id' => intval('3'),
            'kota_id' => intval('244'),
            'distrik_id' => intval('3627'),
            'desa_id' => intval('45102'),
        ]);
        Pegawai::create([
            'user_id' => intval('6'),
            'alamat_id' => intval('3'),
            'jabatan' => 'teknisi_audio_visual',
            'jumlah_order' => intval('0'),
        ]);
        // Record 4
        Alamat::create([
            'id' => intval('4'),
            'kota_id' => intval('244'),
            'distrik_id' => intval('3627'),
            'desa_id' => intval('45101'),
        ]);
        Pegawai::create([
            'user_id' => intval('8'),
            'alamat_id' => intval('4'),
            'jabatan' => 'kenek',
            'jumlah_order' => intval('0'),
        ]);
    }
}
