<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembaruanArmada;
use App\Models\ArmadaBus;
use Carbon\Carbon;

class PembaruanArmadaController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_pembaruan_armada = PembaruanArmada::when($request->search, function($query) use($request){
            $query->Where('pembaruan', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('created_at', 'LIKE', '%'.$request->search.'%');
        })->orWhereHas('armada_bus', function($query) use($request){
            $query->where('nama', 'LIKE', '%'.$request->search.'%');
        })->sortable()->orderBy('created_at', 'desc')->paginate(10);

        $events = array();
        $jadwal_pembaruan_armada = PembaruanArmada::get();

        foreach($jadwal_pembaruan_armada as $jadwal_pembaruan){
            $events[] = [
                'title' => $jadwal_pembaruan->armada_bus->nama . ' - ' . $jadwal_pembaruan->pembaruan,
                'start' => Carbon::parse($jadwal_pembaruan->created_at),
                'borderColor' => '#000',
                'allDay' => true
            ];
        }
        return view('admin.pembaruanarmada.index', compact('data_pembaruan_armada', 'search_key', 'events'));
    }

    public function add(){
        $data_armada_bus = ArmadaBus::all();
        return view('admin.pembaruanarmada.tambah', compact('data_armada_bus'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'armada_bus_id' => 'required',
            'pembaruan' => 'required'
        ], [
            'armada_bus_id.required' => 'Armada Bus harus dipilih',
            'pembaruan.required' => 'Pembaruan tidak boleh kosong'
        ]);

        $armada_bus_id = $request->armada_bus_id;

        $pembaruan_armada = new PembaruanArmada;
        $pembaruan_armada->armada_bus_id = $armada_bus_id;
        $pembaruan_armada->pembaruan = $request->pembaruan;
        $pembaruan_armada->save();

        $armada_bus = ArmadaBus::find($armada_bus_id);
        $nama_armada_bus = $armada_bus->nama;

        return redirect('/admin/pembaruan-armada')->with('success', 'Data Pembaruan Armada "'.$nama_armada_bus.'" Berhasil Ditambahkan');
    }

    public function edit($id){
        $data_armada_bus = ArmadaBus::all();
        $pembaruan_armada = PembaruanArmada::find($id);

        return view('admin.pembaruanarmada.ubah', compact('pembaruan_armada', 'data_armada_bus'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'armada_bus_id' => 'required',
            'pembaruan' => 'required'
        ], [
            'armada_bus_id.required' => 'Armada Bus harus dipilih',
            'pembaruan.required' => 'Pembaruan tidak boleh kosong'
        ]);

        $pembaruan_armada = PembaruanArmada::find($id);
        $pembaruan_armada->armada_bus_id = $request->armada_bus_id;
        $pembaruan_armada->pembaruan = $request->pembaruan;
        $pembaruan_armada->save();

        return redirect('/admin/pembaruan-armada')->with('success', 'Data Pembaruan Armada "'.$pembaruan_armada->armada_bus->nama.'" Berhasil Diubah!');
    }

    public function destroy($id){
        $pembaruan_armada = PembaruanArmada::find($id);
        $pembaruan_armada->delete();

        return redirect('/admin/pembaruan-armada')->with('success', 'Data Pembaruan Armada "'.$pembaruan_armada->armada_bus->nama.'" Berhasil Dihapus!');
    }
}
