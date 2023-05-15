<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\ArmadaBus;
use Illuminate\Http\Request;

class ArmadaBusController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search;
        $data_armada_bus = ArmadaBus::when($request->search, function($query) use($request){
            $query->where('nama', 'LIKE', '%'.$request->search.'%')
            ->orWhere('kursi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('sassis', 'LIKE', '%'.$request->search.'%')
            ->orWhere('jenis_bus', 'LIKE', '%'.$request->search.'%')
            ->orWhere('plat_nomor', 'LIKE', '%'.$request->search.'%');
        })->sortable('nama')->paginate(10);
        return view('admin.armadabus.index', compact('data_armada_bus', 'search_key'));
    }

    public function add(){
        return view('admin.armadabus.tambah');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'kursi' => 'required',
            'sassis' => 'required',
            'jenis_bus' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required|unique:armada_bus,plat_nomor',
        ],[
            'nama.required' => 'Nama bus tidak boleh kosong',
            'kursi.required' => 'Jumlah kursi tidak boleh kosong',
            'sassis.required' => 'Sassis bus tidak boleh kosong',
            'warna.required' => 'Warna tidak boleh kosong',
            'plat_nomor.required' => 'Plat Nomor tidak boleh kosong',
            'plat_nomor.unique' => 'Plat Nomor sudah digunakan oleh armada lain',
        ]);

        $armada_bus = new ArmadaBus;
        $armada_bus->nama = $request->nama;
        $armada_bus->kursi = $request->kursi;
        $armada_bus->sassis = $request->sassis;
        $armada_bus->jenis_bus = $request->jenis_bus;
        $armada_bus->warna = $request->warna;
        $armada_bus->plat_nomor = $request->plat_nomor;
        $armada_bus->gps = $request->gps;
        if($request->hasFile('gambar')){
            $this->validate($request, [
                'gambar' => 'image|max:4000',
            ],[
                'gambar.image' => 'File yang anda masukkan bukan gambar, gunakan format lain',
                'gambar.max' => 'File terlalu besar, gunakan file kurang dari 4MB'
            ]);
            $picture_name = 'Bus-'.$request->nama.'.'.$request->gambar->getClientoriginalExtension();
            $request->gambar->move(public_path('assets/images/armada_bus/'), $picture_name);
            $armada_bus->gambar = $picture_name;
        }if(!$request->hasFile('gambar')){
            $armada_bus->gambar = 'default_gambar_bus.png';
        }
        $armada_bus->save();

        return redirect('/admin/armada-bus/')->with('success', 'Data Armada Bus "'.$request->nama.'" Berhasil Ditambahkan!');
    }

    public function edit($id){
        $armada_bus = ArmadaBus::find($id);

        return view('admin.armadabus.ubah', compact('armada_bus'));
    }

    public function update(Request $request, $id){
        $armada_bus = ArmadaBus::find($id);

        $this->validate($request, [
            'nama' => 'required',
            'kursi' => 'required',
            'sassis' => 'required',
            'jenis_bus' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required|exclude_if:plat_nomor,'.$armada_bus->plat_nomor.'|unique:armada_bus,plat_nomor',
        ],[
            'nama.required' => 'Nama bus tidak boleh kosong',
            'kursi.required' => 'Jumlah kursi tidak boleh kosong',
            'sassis.required' => 'Sassis bus tidak boleh kosong',
            'warna.required' => 'Warna tidak boleh kosong',
            'plat_nomor.required' => 'Plat Nomor tidak boleh kosong',
            'plat_nomor.unique' => 'Plat Nomor sudah digunakan oleh armada lain',
        ]);

        $armada_bus->nama = $request->nama;
        $armada_bus->kursi = $request->kursi;
        $armada_bus->sassis = $request->sassis;
        $armada_bus->jenis_bus = $request->jenis_bus;
        $armada_bus->warna = $request->warna;
        $armada_bus->plat_nomor = $request->plat_nomor;
        $armada_bus->gps = $request->gps;
        if($request->hasFile('gambar')){
            $this->validate($request, [
                'gambar' => 'image|max:4000',
            ],[
                'gambar.image' => 'File yang anda masukkan bukan gambar, gunakan format lain',
                'gambar.max' => 'File terlalu besar, gunakan file kurang dari 4MB'
            ]);
            $picture_path = public_path('assets/images/armada_bus/');
            $picture_name = 'Bus-'.$request->nama.'.'.$request->gambar->getClientoriginalExtension();
            if(File::exists($picture_path.$picture_name)){
                File::delete($picture_path.$picture_name);
            }
            $request->gambar->move($picture_path, $picture_name);
            $armada_bus->gambar = $picture_name;
        }
        $armada_bus->save();

        return redirect('/admin/armada-bus/')->with('success', 'Data Armada Bus "'.$request->nama.'" Berhasil Diubah!');
    }

    public function destroy($id){
        $armada_bus = ArmadaBus::find($id);
        $armada_bus->delete();

        return redirect('/admin/armada-bus/')->with('success', 'Data Armada Bus Berhasil Dihapus');
    }
}
