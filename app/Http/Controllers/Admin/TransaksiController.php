<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\ArmadaBus;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_transaksi = Transaksi::when($request->search, function($query) use($request){
            $query->where('nominal', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                  ->orWhereHas('reservasi', function($query) use($request){
                        $query->where('kode', 'LIKE', '%'.$request->search.'%')
                        ->orWhereHas('user', function($query) use($request){
                            $query->where('nama_depan', 'LIKE', '%'.$request->search.'%')
                                ->orwhere('nama_belakang', 'LIKE', '%'.$request->search.'%');
                        });
                    });
        })->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.transaksi.index', compact('data_transaksi', 'search_key'));
    }

    public function add(){
        $data_reservasi = Reservasi::where('status', '!=', 'lunas')->get();

        return view('admin.transaksi.tambah', compact('data_reservasi'));
    }

    public function store(Request $request){
        $transaksi = new Transaksi;
        $transaksi->reservasi_id = $request->reservasi_id;
        $transaksi->nominal = $request->nominal;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        $reservasi_id = $request->reservasi_id;
        $reservasi = Reservasi::find($reservasi_id);
        $reservasi->dibayar += $request->nominal;
        $reservasi->save();

        if($reservasi->status == 'menunggu'){
            //get multiple armada bus in reservation and store it to array
            foreach($reservasi->reservasi_armada_bus as $reservasi_armada_bus){
                $armada_bus = ArmadaBus::find($reservasi_armada_bus->armada_bus_id);
                $event = new Event; //event from vendor gcal
                $event->name = $armada_bus->nama .' - '. $reservasi->kota_tujuan;
                $event->startDateTime = Carbon::parse($reservasi->tanggal_mulai)->setTime(8, 00, 00)->setTimezone('Asia/Jakarta');
                $event->endDateTime = Carbon::parse($reservasi->tanggal_selesai)->setTime(23, 59, 59)->setTimezone('Asia/Jakarta');
                $event->save();
            }
        }

        if($reservasi->total_harga == $reservasi->dibayar){
            $reservasi->status = 'lunas';
            $reservasi->save();
        }else{
            $reservasi->status = 'dibayar';
            $reservasi->save();
        }
        return redirect('/admin/transaksi')->with('success', 'Data Transaksi Berhasil Ditambahkan!');
    }

    public function edit($id){
        $transaksi = Transaksi::find($id);
        $data_reservasi = Reservasi::all();

        return view('admin.transaksi.ubah', compact('transaksi', 'data_reservasi'));
    }

    public function update(Request $request, $id){
        $transaksi = Transaksi::find($id);

        $reservasi_id = $transaksi->reservasi->id;
        $reservasi = Reservasi::find($reservasi_id);
        $reservasi->dibayar -= $transaksi->nominal;
        $reservasi->dibayar += $request->nominal;

        $transaksi->nominal = $request->nominal;
        $transaksi->keterangan = $request->keterangan;

        $transaksi->save();
        $reservasi->save();

        return redirect('/admin/transaksi')->with('success', 'Data Transaksi Berhasil Diubah!');
    }

    public function destroy($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        $reservasi_id = $transaksi->reservasi->id;
        $reservasi = Reservasi::find($reservasi_id);
        $reservasi->dibayar -= $transaksi->nominal;
        $reservasi->save();

        return redirect('/admin/transaksi')->with('success', 'Data Transaksi Berhasil Dihapus!');
    }
}
