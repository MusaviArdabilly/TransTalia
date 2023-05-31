<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Reservasi;

class DashboardController extends Controller
{
    public function index(){
        $tahun_sekarang = now()->year;
        $bulan_sekarang = now()->month;
        $pemasukan_tahunan = Transaksi::whereYear('created_at', $tahun_sekarang)->sum('nominal');
        $pemasukan_bulanan = Transaksi::whereMonth('created_at', $bulan_sekarang)->sum('nominal');
        $transaksi_bulanan = Transaksi::whereMonth('created_at', $bulan_sekarang)->count();
        $transaksi_bulanan_uang_muka = Transaksi::where('keterangan', 'uang_muka')->whereMonth('created_at', $bulan_sekarang)->count();
        $transaksi_bulanan_cicilan = Transaksi::where('keterangan', 'cicilan')->whereMonth('created_at', $bulan_sekarang)->count();
        $transaksi_bulanan_pelunasan = Transaksi::where('keterangan', 'pelunasan')->whereMonth('created_at', $bulan_sekarang)->count();
        $reservasi_bulanan = Reservasi::whereMonth('created_at', $bulan_sekarang)->count();
        $reservasi_bulanan_menunggu = Reservasi::where('status', 'menunggu')->whereMonth('created_at', $bulan_sekarang)->count();
        $reservasi_bulanan_dibayar = Reservasi::where('status', 'dibayar')->whereMonth('created_at', $bulan_sekarang)->count();
        $reservasi_bulanan_lunas = Reservasi::where('status', 'lunas')->whereMonth('created_at', $bulan_sekarang)->count();
        $reservasi_bulanan_batal = Reservasi::where('status', 'batal')->whereMonth('created_at', $bulan_sekarang)->count();
        $array_pendapatan = array();
        $array_transaksi = array();
        for ($month = 1; $month <= 12; $month++) {
            $total_pendapatan = Reservasi::whereMonth('tanggal_mulai', $month)->where('status', '!=', 'batal')->sum('total_harga');
            $array_pendapatan[] = [
                'month' => $month,
                'data' => (int)$total_pendapatan
            ];
        }
        for ($month = 1; $month <= 12; $month++) {
            $total_nominal = Transaksi::whereMonth('created_at', $month)->sum('nominal');
            $array_transaksi[] = [
                'month' => $month,
                'data' => $total_nominal
            ];
        }

        // return $array_pendapatan;
        return view('admin.dashboard', compact('pemasukan_tahunan', 
                                               'pemasukan_bulanan', 
                                               'transaksi_bulanan', 'transaksi_bulanan_uang_muka', 'transaksi_bulanan_cicilan', 'transaksi_bulanan_pelunasan', 
                                               'reservasi_bulanan', 'reservasi_bulanan_menunggu', 'reservasi_bulanan_dibayar', 'reservasi_bulanan_lunas', 'reservasi_bulanan_batal',
                                               'array_pendapatan', 
                                               'array_transaksi'));
    }
}
