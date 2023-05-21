<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerawatanArmada;
use App\Models\KodePerawatan;
use App\Models\ArmadaBus;

class PerawatanArmadaController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_perawatan_armada = PerawatanArmada::when($request->search, function($query) use($request){
            $query->where('armada_bus.nama', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('created_at', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('kode_perawatan.kode', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('kode_perawatan.keterangan', 'LIKE', '%'.$request->search.'%');
        })->sortable()->paginate(10);
        return view('admin.perawatanarmada.index', compact('data_perawatan_armada', 'search_key'));
    }

    public function add(){
        $data_armada_bus = ArmadaBus::all();
        $data_kode_perawatan = KodePerawatan::all();
        return view('admin.perawatanarmada.tambah', compact('data_armada_bus', 'data_kode_perawatan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'armada_bus_id' => 'required',
            'kode_perawatan_id' => 'required'
        ], [
            'armada_bus_id.required' => 'Armada Bus harus dipilih',
            'kode_perawatan_id.required' => 'Kode Perawatan harus dipilih'
        ]);

        $armada_bus_id = $request->armada_bus_id;

        $perawatan_armada = new PerawatanArmada;
        $perawatan_armada->armada_bus_id = $armada_bus_id;
        $perawatan_armada->kode_perawatan_id = $request->kode_perawatan_id;
        $perawatan_armada->save();

        $armada_bus = ArmadaBus::find($armada_bus_id);
        $nama_armada_bus = $armada_bus->nama;

        return redirect('/admin/perawatan-armada/')->with('success', 'Data Perawatan Armada "'.$nama_armada_bus.'" Berhasil Ditambahkan!');
    }

    public function edit($id){
        $data_armada_bus = ArmadaBus::all();
        $data_kode_perawatan = KodePerawatan::all();
        $perawatan_armada = PerawatanArmada::find($id);

        return view('admin.perawatanarmada.ubah', compact('data_armada_bus', 'data_kode_perawatan', 'perawatan_armada'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'armada_bus_id' => 'required',
            'kode_perawatan_id' => 'required'
        ], [
            'armada_bus_id.required' => 'Armada Bus harus dipilih',
            'kode_perawatan_id.required' => 'Kode Perawatan harus dipilih'
        ]);

        $perawatan_armada = PerawatanArmada::find($id);
        $perawatan_armada->armada_bus_id = $request->armada_bus_id;
        $perawatan_armada->kode_perawatan_id = $request->kode_perawatan_id;
        $perawatan_armada->save();

        return redirect('/admin/perawatan-armada')->with('success', 'Data Perawatan Armada "'.$perawatan_armada->armada_bus->nama.'" Berhasil Diubah!');
    }

    public function destroy($id){
        $perawatan_armada = PerawatanArmada::find($id);
        $perawatan_armada->delete();
        return redirect('/admin/perawatan-armada')->with('success', 'Data Perawatan Armada "'.$perawatan_armada->armada_bus->nama.'" Berhasil Dihapus!');
    }
}
