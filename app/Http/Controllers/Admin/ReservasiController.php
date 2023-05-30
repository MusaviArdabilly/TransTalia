<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function notifikasi(){
        $data_notifikasi_reservasi = Reservasi::where('status', 'menunggu')->orderBy('created_at', 'desc')->get();

        return $data_notifikasi_reservasi;
    }

    public function index(Request $request){
        $search_key = $request->search;
        $filter = $request->filter;
        $data_reservasi = Reservasi::when($request->filter, function($query) use($request){
            $query->where('status', 'LIKE', $request->filter);
        })->when($request->search, function($query) use($request){
            $query->where('kode', 'LIKE', '%'.$request->search.'%')
            ->orWhere('kota_tujuan', 'LIKE', '%'.$request->search.'%')
            ->orWhere('total_harga', 'LIKE', '%'.$request->search.'%')
            ->orWhere('dibayar', 'LIKE', '%'.$request->search.'%')
            ->orWhereHas('user', function($query) use($request){
                $query->where('nama_depan', 'LIKE', '%'.$request->search.'%')
                      ->orWhere('nama_belakang', 'LIKE', '%'.$request->search.'%');
            });
        })->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.reservasi.index', compact('data_reservasi', 'filter', 'search_key'));
    }

    public function edit($id){
        $reservasi = Reservasi::find($id);

        return view('admin.reservasi.ubah', compact('reservasi'));
    }

    public function update(Request $request, $id){
        $reservasi = Reservasi::find($id);
        $reservasi->status = $request->status;
        $reservasi->total_harga = $request->total_harga;
        $reservasi->save();
        //add to first transaction
        //store to event google calendar //store only if already paid
        // $armada_bus = ArmadaBus::find($id_armada_bus);
        // $event = new Event; //event from vendor gcal
        // $event->name = $armada_bus->nama .' - '. $request->kota_tujuan;
        // $event->startDateTime = Carbon::parse($request->tanggal_mulai);
        // $event->endDateTime = Carbon::parse($request->tanggal_selesai);
        // $event->save();

        return redirect('/admin/reservasi/')->with('success', 'Total harga pada data Reservasi "'.$request->kode_reservasi.'" Telah berhasil diubah!');
    }

    public function destroy($id){
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        return redirect('/admin/reservasi/')->with('success', 'Data Reservasi Telah berhasil dihapus!');
    }
}
