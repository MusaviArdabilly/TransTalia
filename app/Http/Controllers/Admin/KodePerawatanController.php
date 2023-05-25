<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodePerawatan;
use Illuminate\Http\Request;

class KodePerawatanController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_kode_perawatan = KodePerawatan::when($request->search, function($query) use($request){
            $query->where('kode', 'LIKE', '%'.$request->search.'%')
            ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%');
        })->sortable('kode')->paginate(20);

        return view('admin.kodeperawatan.index', compact('data_kode_perawatan', 'search_key'));
    }

    public function add(){
        return view('admin.kodeperawatan.tambah');
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',
        ],[
            'kode.required' => 'Kode Perawatan tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'kategori.required' => 'Kategori Barang tidak boleh kosong',
        ]);

        $kode_perawatan = new KodePerawatan;
        $kode_perawatan->kode = $request->kode;
        $kode_perawatan->keterangan = $request->keterangan;
        $kode_perawatan->kategori = $request->kategori;
        $kode_perawatan->save();

        return redirect('/admin/kode-perawatan')->with('success', 'Data Kode Perawatan "'.$request->kode.'" Berhasil Ditambahkan!');
    }

    public function edit($id){
        $kode_perawatan = KodePerawatan::find($id);

        return view('admin.kodeperawatan.ubah', compact('kode_perawatan'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'kode' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',
        ],[
            'kode.required' => 'Kode Perawatan tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'kategori.required' => 'Kategori Barang tidak boleh kosong',
        ]);

        $kode_perawatan = KodePerawatan::find($id);
        $kode_perawatan->kode = $request->kode;
        $kode_perawatan->keterangan = $request->keterangan;
        $kode_perawatan->kategori = $request->kategori;
        $kode_perawatan->save();

        return redirect('/admin/kode-perawatan')->with('success', 'Data Kode Perawatan "'.$request->kode.'" Berhasil Diubah!');
    }

    public function destroy($id){
        $kode_perawatan = KodePerawatan::find($id);
        $kode_perawatan->delete();

        return redirect('/admin/kode-perawatan')->with('success', 'Data Kode Perawatan Berhasil Dihapus');
    }
}
