<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservasiArmadaBus;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(){
        $events = array();
        $schedules = ReservasiArmadaBus::with('reservasi', 'armada_bus')->get();

        foreach($schedules as $schedule){
            $parts = explode(',', $schedule->reservasi->kota_tujuan);
            $kota_tujuan = array_pop($parts);
            $kota_tujuan = implode(', ', $parts);
            $events[] = [
                'title' => $schedule->armada_bus->nama . ' - ' . $kota_tujuan,
                'start' => Carbon::parse($schedule->reservasi->tanggal_mulai)->setTime(8, 00, 00)->setTimezone('Asia/Jakarta')->toDateTimeString(),
                'end' => Carbon::parse($schedule->reservasi->tanggal_selesai)->addDay()->setTime(23, 59, 59)->setTimezone('Asia/Jakarta')->toDateTimeString(),
                'backgroundColor' => self::getStatusColor($schedule->reservasi->status),
                'textColor' => self::getTextColor($schedule->reservasi->status),
                'borderColor' => '#000',
                'allDay' => true
            ];
        }

        // return $events;

        return view('admin.jadwal.index', compact('events'));
    }
        
    public static function getStatusColor($status){
        if ($status == 'menunggu'){
            return '#FFC107';
        }elseif($status == 'dibayar') {
            return '';
        }elseif($status == 'lunas'){
            return '#28A745';
        }
    }
        
    public static function getTextColor($status){
        if ($status == 'menunggu'){
            return '#000';
        }elseif($status == 'dibayar') {
            return '';
        }elseif($status == 'lunas'){
            return '';
        }
    }
    
}
