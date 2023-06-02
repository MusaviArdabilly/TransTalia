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
            'armada_bus_id' => intval('1'), 
            'pembaruan' => 'Dashboard', 
            'created_at' => '2023-05-01 10:32:31',
        ]);
        //Record 2
        PembaruanArmada::create([
            'armada_bus_id' => intval('1'), 
            'pembaruan' => 'Repaint Body', 
            'created_at' => '2023-05-01 10:35:31',
        ]);
        //Record 3
        PembaruanArmada::create([
            'armada_bus_id' => intval('4'), 
            'pembaruan' => 'Windshield', 
            'created_at' => '2023-05-03 10:32:31',
        ]);
        //Record 4
        PembaruanArmada::create([
            'armada_bus_id' => intval('9'), 
            'pembaruan' => 'Bumper depan', 
            'created_at' => '2023-05-05 10:32:31',
        ]);
        //Record 5
        PembaruanArmada::create([
            'armada_bus_id' => intval('12'), 
            'pembaruan' => 'Repaint Body', 
            'created_at' => '2023-05-05 10:32:31',
        ]);
        //Record 6
        PembaruanArmada::create([
            'armada_bus_id' => intval('10'), 
            'pembaruan' => 'Kursi Jok', 
            'created_at' => '2023-05-07 10:32:31',
        ]);
        //Record 7
        PembaruanArmada::create([
            'armada_bus_id' => intval('7'), 
            'pembaruan' => 'TV Android', 
            'created_at' => '2023-05-09 10:32:31',
        ]);
        //Record 8
        PembaruanArmada::create([
            'armada_bus_id' => intval('7'), 
            'pembaruan' => 'Sub Woofer', 
            'created_at' => '2023-05-09 10:32:31',
        ]);
        //Record 9
        PembaruanArmada::create([
            'armada_bus_id' => intval('3'), 
            'pembaruan' => 'Wrap Bagasi', 
            'created_at' => '2023-05-10 10:32:31',
        ]);
        //Record 10
        PembaruanArmada::create([
            'armada_bus_id' => intval('2'), 
            'pembaruan' => 'TV Android', 
            'created_at' => '2023-05-12 10:32:31',
        ]);
        //Record 11
        PembaruanArmada::create([
            'armada_bus_id' => intval('5'), 
            'pembaruan' => 'Kaca Samping', 
            'created_at' => '2023-05-17 10:32:31',
        ]);
        //Record 12
        PembaruanArmada::create([
            'armada_bus_id' => intval('5'), 
            'pembaruan' => 'Pintu', 
            'created_at' => '2023-05-17 10:32:31',
        ]);
        //Record 13
        PembaruanArmada::create([
            'armada_bus_id' => intval('8'), 
            'pembaruan' => 'Wrap Lantai', 
            'created_at' => '2023-05-20 10:32:31',
        ]);
    }
}
