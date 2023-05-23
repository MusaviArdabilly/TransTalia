<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;

class PerformaPegawaiController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_pegawai = Pegawai::when($request->search, function($query) use($request){
            $query->where('jumlah_order', 'LIKE', '%'.$request->search.'%');
        })->orWhereHas('user', function($query) use($request){
            $query->where('nama_depan', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('nama_belakang', 'LIKE', '%'.$request->search.'%');
        })->sortable('user.nama_depan')->paginate(10);

        return view('admin.performapegawai.index', compact('data_pegawai', 'search_key'));
    }

    public function edit($id){
        $pegawai = Pegawai::find($id);

        return view('admin.performapegawai.ubah', compact('pegawai'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'jumlah_order' => 'required'
        ], [
            'jumlah_order.required' => 'Jumlah Order tidak boleh kosong'
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->jumlah_order = $request->jumlah_order;
        $pegawai->save();

        return redirect('/admin/performa-pegawai')->with('success', 'Data Performa Pegawai "'.$pegawai->user->nama_depan.' '.$pegawai->user->nama_belakang.'" Berhasil Diubah!');
    }
}
