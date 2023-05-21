<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerawatanArmada;

class PerawatanArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Record 1
        PerawatanArmada::create([
            'armada_bus_id' => '1', 
            'kode_perawatan_id' => '1', 
            'created_at' => '2023-05-01 10:32:31',
        ]);
        //Record 2
        PerawatanArmada::create([
            'armada_bus_id' => '1', 
            'kode_perawatan_id' => '3', 
            'created_at' => '2023-05-01 15:03:31',
        ]);
        //Record 3
        PerawatanArmada::create([
            'armada_bus_id' => '2', 
            'kode_perawatan_id' => '3', 
            'created_at' => '2023-05-05 16:35:31',
        ]);
        //Record 4
        PerawatanArmada::create([
            'armada_bus_id' => '5', 
            'kode_perawatan_id' => '3', 
            'created_at' => '2023-05-05 12:44:31',
        ]);
        //Record 5
        PerawatanArmada::create([
            'armada_bus_id' => '3', 
            'kode_perawatan_id' => '1', 
            'created_at' => '2023-05-05 09:12:31',
        ]);
        //Record 6
        PerawatanArmada::create([
            'armada_bus_id' => '4', 
            'kode_perawatan_id' => '1', 
            'created_at' => '2023-05-12 11:04:31',
        ]);
        //Record 7
        PerawatanArmada::create([
            'armada_bus_id' => '8', 
            'kode_perawatan_id' => '5', 
            'created_at' => '2023-05-15 11:32:31',
        ]);
        //Record 8
        PerawatanArmada::create([
            'armada_bus_id' => '9', 
            'kode_perawatan_id' => '5', 
            'created_at' => '2023-05-16 08:42:31',
        ]);
        //Record 9
        PerawatanArmada::create([
            'armada_bus_id' => '4', 
            'kode_perawatan_id' => '2', 
            'created_at' => '2023-05-17 08:03:31',
        ]);
        //Record 10
        PerawatanArmada::create([
            'armada_bus_id' => '4', 
            'kode_perawatan_id' => '4', 
            'created_at' => '2023-05-17 09:32:31',
        ]);
        //Record 11
        PerawatanArmada::create([
            'armada_bus_id' => '7', 
            'kode_perawatan_id' => '5', 
            'created_at' => '2023-05-20 13:41:31',
        ]);
        //Record 12
        PerawatanArmada::create([
            'armada_bus_id' => '6', 
            'kode_perawatan_id' => '5', 
            'created_at' => '2023-05-21 10:25:31',
        ]);
    }
}
