<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PembaruanArmada;

class PembaruanArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '1', 
            'pembaruan' => 'Dashboard', 
            'created_at' => '2023-05-01 10:32:31',
        ]);
        //Record 2
        PembaruanArmada::create([
            'armada_bus_id' => '1', 
            'pembaruan' => 'Repaint Body', 
            'created_at' => '2023-05-01 10:35:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '4', 
            'pembaruan' => 'Windshield', 
            'created_at' => '2023-05-03 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '9', 
            'pembaruan' => 'Bumper depan', 
            'created_at' => '2023-05-05 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '12', 
            'pembaruan' => 'Repaint Body', 
            'created_at' => '2023-05-05 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '10', 
            'pembaruan' => 'Kursi Jok', 
            'created_at' => '2023-05-07 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '7', 
            'pembaruan' => 'TV Android', 
            'created_at' => '2023-05-09 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '7', 
            'pembaruan' => 'Sub Woofer', 
            'created_at' => '2023-05-09 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '3', 
            'pembaruan' => 'Wrap Bagasi', 
            'created_at' => '2023-05-10 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '2', 
            'pembaruan' => 'TV Android', 
            'created_at' => '2023-05-12 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '5', 
            'pembaruan' => 'Kaca Samping', 
            'created_at' => '2023-05-17 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '5', 
            'pembaruan' => 'Pintu', 
            'created_at' => '2023-05-17 10:32:31',
        ]);
        //Record 1
        PembaruanArmada::create([
            'armada_bus_id' => '8', 
            'pembaruan' => 'Wrap Lantai', 
            'created_at' => '2023-05-20 10:32:31',
        ]);
    }
}
