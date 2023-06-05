<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservasi;
use App\Models\ReservasiArmadaBus;
use App\Models\Pegawai;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Record 1-------------------------------------------------------------------------------------- tambahkan performa pegawai juga
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230428171721', 
            'user_id' => intval('11'), 
            'tanggal_mulai' => '2023-05-01', 
            'tanggal_selesai' => '2023-05-02', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Banyuwangi, Kabupaten Banyuwangi, Jawa Timur, Indonesia', 
            'total_harga' => intval('17544000'), 
            'dibayar' => intval('17544000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('1'), 
            'sub_total' => intval('8772000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('4'), 
            'sub_total' => intval('8772000'),
        ]);
        //Record 2--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230429171721', 
            'user_id' => intval('10'), 
            'tanggal_mulai' => '2023-05-01', 
            'tanggal_selesai' => '2023-05-01', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Situbondo, Kabupaten Situbondo, Jawa Timur, Indonesia', 
            'total_harga' => intval('9984000'), 
            'dibayar' => intval('9984000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('2'), 
            'sub_total' => intval('10908000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('3'), 
            'sub_total' => intval('10908000'),
        ]);
        //Record 3--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230429181721', 
            'user_id' => intval('9'), 
            'tanggal_mulai' => '2023-05-04', 
            'tanggal_selesai' => '2023-05-05', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Jogja, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia', 
            'total_harga' => intval('12576000'), 
            'dibayar' => intval('12576000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('5'), 
            'sub_total' => intval('6288000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('7'), 
            'sub_total' => intval('6288000'),
        ]);
        //Record 4--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230429181721', 
            'user_id' => intval('1'), 
            'tanggal_mulai' => '2023-05-11', 
            'tanggal_selesai' => '2023-05-14', 
            'kota_jemput' => 'Jombang, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Bandung, Kota Bandung, Jawa Barat, Indonesia', 
            'total_harga' => intval('29304000'), 
            'dibayar' => intval('29304000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('7'), 
            'sub_total' => intval('15984000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('12'), 
            'sub_total' => intval('13320000'),
        ]);
        //Record 5--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230431181721', 
            'user_id' => intval('9'), 
            'tanggal_mulai' => '2023-05-11', 
            'tanggal_selesai' => '2023-05-11', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Surabaya, Jawa Timur, Indonesia', 
            'total_harga' => intval('3000000'), 
            'dibayar' => intval('3000000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('1'), 
            'sub_total' => intval('3000000'),
        ]);
        //Record 6--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230503181721', 
            'user_id' => intval('10'), 
            'tanggal_mulai' => '2023-05-12', 
            'tanggal_selesai' => '2023-05-12', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Batu, Kota Batu, Jawa Timur, Indonesia', 
            'total_harga' => intval('3000000'), 
            'dibayar' => intval('3000000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('3'), 
            'sub_total' => intval('3000000'),
        ]);
        //Record 7--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230504181721', 
            'user_id' => intval('8'), 
            'tanggal_mulai' => '2023-05-13', 
            'tanggal_selesai' => '2023-05-13', 
            'kota_jemput' => 'Mojoagung, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Batu, Kota Batu, Jawa Timur, Indonesia', 
            'total_harga' => intval('3000000'), 
            'dibayar' => intval('3000000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('4'), 
            'sub_total' => intval('3000000'),
        ]);
        $pegawai = Pegawai::where('user_id', $reservasi->user_id)->first();
        $pegawai->jumlah_order += 1;
        $pegawai->save();
        //Record 8--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230506181721', 
            'user_id' => intval('2'), 
            'tanggal_mulai' => '2023-05-17', 
            'tanggal_selesai' => '2023-05-18', 
            'kota_jemput' => 'Jombang, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Magetan, Kabupaten Magetan, Jawa Timur, Indonesia', 
            'total_harga' => intval('6000000'), 
            'dibayar' => intval('6000000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('7'), 
            'sub_total' => intval('6000000'),
        ]);
        $pegawai = Pegawai::where('user_id', $reservasi->user_id)->first();
        $pegawai->jumlah_order += 1;
        $pegawai->save();
        //Record 9--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230509181721', 
            'user_id' => intval('7'), 
            'tanggal_mulai' => '2023-05-22', 
            'tanggal_selesai' => '2023-05-24', 
            'kota_jemput' => 'Jombang, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Jogja, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia', 
            'total_harga' => intval('24936000'), 
            'dibayar' => intval('24936000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('1'), 
            'sub_total' => intval('8312000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('6'), 
            'sub_total' => intval('8312000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('7'), 
            'sub_total' => intval('8312000'),
        ]);
        //Record 10--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230511181721', 
            'user_id' => intval('4'), 
            'tanggal_mulai' => '2023-05-28', 
            'tanggal_selesai' => '2023-05-31', 
            'kota_jemput' => 'Jombang, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Bandung, Kota Bandung, Jawa Barat, Indonesia', 
            'total_harga' => intval('31968000'), 
            'dibayar' => intval('31968000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('5'), 
            'sub_total' => intval('15984000'),
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('6'), 
            'sub_total' => intval('15984000'),
        ]);
        $pegawai = Pegawai::where('user_id', $reservasi->user_id)->first();
        $pegawai->jumlah_order += 1;
        $pegawai->save();
        //Record 11--------------------------------------------------------------------------------------
        $reservasi = Reservasi::create([
            'kode' => 'TRM-Musavi230525181721', 
            'user_id' => intval('4'), 
            'tanggal_mulai' => '2023-05-28', 
            'tanggal_selesai' => '2023-05-31', 
            'kota_jemput' => 'Jombang, Kabupaten Jombang, Jawa Timur, Indonesia', 
            'kota_tujuan' => 'Batu, Kota Batu, Jawa Timur, Indonesia', 
            'total_harga' => intval('3000000'), 
            'dibayar' => intval('300000'), 
            'status' => 'lunas', 
            'created_at' => '2023-05-27 16:23:07',
            'updated_at' => '2023-05-27 16:23:07',
        ]);
        ReservasiArmadaBus::create([
            'reservasi_id' => $reservasi->id, 
            'armada_bus_id' => intval('10'), 
            'sub_total' => intval('3000000'),
        ]);
        $pegawai = Pegawai::where('user_id', $reservasi->user_id)->first();
        $pegawai->jumlah_order += 1;
        $pegawai->save();
    }
}
