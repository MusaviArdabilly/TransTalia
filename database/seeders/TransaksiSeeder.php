<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Record 1----Reservasi 1----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '1', 
            'nominal' => intval('10000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 2----Reservasi 1----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '1', 
            'nominal' => intval('7544000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 3----Reservasi 2----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '2', 
            'nominal' => intval('5000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 4----Reservasi 2----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '2', 
            'nominal' => intval('4984000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 5----Reservasi 3----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '3', 
            'nominal' => intval('10000000'),
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 6----Reservasi 3----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '3', 
            'nominal' => intval('2576000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-03 16:23:07',
            'updated_at' => '2023-05-03 16:23:07',
        ]);
        //Record 7----Reservasi 4----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '4', 
            'nominal' => intval('10000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 8----Reservasi 4----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '4', 
            'nominal' => intval('19304000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-10 16:23:07',
            'updated_at' => '2023-05-10 16:23:07',
        ]);
        //Record 9----Reservasi 5----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '5', 
            'nominal' => intval('2000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-01 16:23:07',
            'updated_at' => '2023-05-01 16:23:07',
        ]);
        //Record 10----Reservasi 5----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '5', 
            'nominal' => intval('1000000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-10 16:23:07',
            'updated_at' => '2023-05-10 16:23:07',
        ]);
        //Record 11----Reservasi 6----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '6', 
            'nominal' => intval('2000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-10 16:23:07',
            'updated_at' => '2023-05-10 16:23:07',
        ]);
        //Record 12----Reservasi 6----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '6', 
            'nominal' => intval('1000000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-12 16:23:07',
            'updated_at' => '2023-05-12 16:23:07',
        ]);
        //Record 13----Reservasi 7----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '7', 
            'nominal' => intval('2000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-11 16:23:07',
            'updated_at' => '2023-05-11 16:23:07',
        ]);
        //Record 14----Reservasi 7----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '7', 
            'nominal' => intval('1000000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-12 16:23:07',
            'updated_at' => '2023-05-12 16:23:07',
        ]);
        //Record 15----Reservasi 8----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '8', 
            'nominal' => intval('4000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-07 16:23:07',
            'updated_at' => '2023-05-07 16:23:07',
        ]);
        //Record 16----Reservasi 8----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '8', 
            'nominal' => intval('2000000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-17 16:23:07',
            'updated_at' => '2023-05-17 16:23:07',
        ]);
        //Record 17----Reservasi 9----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '9', 
            'nominal' => intval('10000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-10 16:23:07',
            'updated_at' => '2023-05-10 16:23:07',
        ]);
        //Record 18----Reservasi 9----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '9', 
            'nominal' => intval('10000000'), 
            'keterangan' => 'cicilan',
            'created_at' => '2023-05-22 16:23:07',
            'updated_at' => '2023-05-22 16:23:07',
        ]);
        //Record 18----Reservasi 9----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '9', 
            'nominal' => intval('4936000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-25 16:23:07',
            'updated_at' => '2023-05-25 16:23:07',
        ]);
        //Record 19----Reservasi 10----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '10', 
            'nominal' => intval('11000000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-12 16:23:07',
            'updated_at' => '2023-05-12 16:23:07',
        ]);
        //Record 20----Reservasi 10----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '10', 
            'nominal' => intval('10000000'), 
            'keterangan' => 'cicilan',
            'created_at' => '2023-05-28 16:23:07',
            'updated_at' => '2023-05-28 16:23:07',
        ]);
        //Record 21----Reservasi 10----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '10', 
            'nominal' => intval('10968000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-31 16:23:07',
            'updated_at' => '2023-05-31 16:23:07',
        ]);
        //Record 21----Reservasi 11----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '11', 
            'nominal' => intval('1500000'), 
            'keterangan' => 'uang_muka',
            'created_at' => '2023-05-26 16:23:07',
            'updated_at' => '2023-05-26 16:23:07',
        ]);
        //Record 21----Reservasi 11----------------------------------------------------------------------------------
        Transaksi::create([
            'reservasi_id' => '11', 
            'nominal' => intval('1500000'), 
            'keterangan' => 'pelunasan',
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
    }
}
