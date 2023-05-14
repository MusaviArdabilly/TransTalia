<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ArmadaBus;
use Illuminate\Database\Seeder;

class ArmadaBusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Record 1
        ArmadaBus::create([
            'nama' => 'Emerald',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#FF4136',
            'plat_nomor' => 'S 5569 WS',
            'gps' => null,
        ]);
        // Record 2
        ArmadaBus::create([
            'nama' => 'Eminence',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino RM280 STD',
            'jenis_bus' => 'High Decker',
            'warna' => '#FF851B',
            'plat_nomor' => 'S 2341 WS',
            'gps' => null,
        ]);
        // Record 3
        ArmadaBus::create([
            'nama' => 'Interceptor',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#FFDC00',
            'plat_nomor' => 'S 4649 WS',
            'gps' => null,
        ]);
        // Record 4
        ArmadaBus::create([
            'nama' => 'Beryl',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino RM280 STD',
            'jenis_bus' => 'High Decker',
            'warna' => '#2ECC40',
            'plat_nomor' => 'S 3342 WS',
            'gps' => null,
        ]);
        // Record 5
        ArmadaBus::create([
            'nama' => 'Convincer',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino 115SDB STD',
            'jenis_bus' => 'High Decker',
            'warna' => '#3D9970',
            'plat_nomor' => 'S 1098 WS',
            'gps' => null,
        ]);
        // Record 6
        ArmadaBus::create([
            'nama' => 'Vencedor',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Mercedes Benz OH 1626',
            'jenis_bus' => 'High Decker',
            'warna' => '#0074D9',
            'plat_nomor' => 'S 9543 WS',
            'gps' => null,
        ]);
        // Record 7
        ArmadaBus::create([
            'nama' => 'Resolute',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino 115SDB STD',
            'jenis_bus' => 'High Decker',
            'warna' => '#001F3F',
            'plat_nomor' => 'S 7178 WS',
            'gps' => null,
        ]);
        // Record 8
        ArmadaBus::create([
            'nama' => 'Alfayiz',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#7FDBFF',
            'plat_nomor' => 'S 8201 WS',
            'gps' => null,
        ]);
        // Record 9
        ArmadaBus::create([
            'nama' => 'Interpid',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '59',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#B10DC9',
            'plat_nomor' => 'S 8521 WS',
            'gps' => null,
        ]);
        // Record 10
        ArmadaBus::create([
            'nama' => 'Aurora',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '39',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#85144b',
            'plat_nomor' => 'S 3091 WS',
            'gps' => null,
        ]);
        // Record 11
        ArmadaBus::create([
            'nama' => 'Orion',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '39',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#F012BE ',
            'plat_nomor' => 'S 9132 WS',
            'gps' => null,
        ]);
        // Record 12
        ArmadaBus::create([
            'nama' => 'Shikra',
            'gambar' => 'default_gambar_bus.png',
            'kursi' => '39',
            'sassis' => 'Hino R260',
            'jenis_bus' => 'High Decker',
            'warna' => '#AAAAAA',
            'plat_nomor' => 'S 2208 WS',
            'gps' => null,
        ]);
        // #FF4136 (red)
        // #FF851B (orange)
        // #FFDC00 (yellow)
        // #2ECC40 (green)
        // #3D9970 (dark green)
        // #0074D9 (blue)
        // #001F3F (navy blue)
        // #7FDBFF (light blue)
        // #B10DC9 (purple)
        // #85144b (maroon)
        // #F012BE (pink)
        // #AAAAAA (gray)
    }
}
