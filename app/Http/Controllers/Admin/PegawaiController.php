<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Alamat\Province;
use App\Models\Alamat\City;
use App\Models\Alamat\District;
use App\Models\Alamat\Village;
use App\Models\Pegawai;
use App\Models\Alamat;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index(Request $request){
        // $data_pegawai = Pegawai::when($request->searchInput, function($query) use($request){
        //     $query->where('nama_depan', 'LIKE', '%'.$request->searchInput.'%')
        //     ->orWhere('nama_belakang', 'LIKE', '%'.$request->searchInput.'%')
        //     ->orWhere('jabatan', 'LIKE', '%'.$request->searchInput.'%')
        //     ->orwhere('alamat', 'LIKE', '%'.$request->searchInput.'%')
        //     ->with(['user']);
        // })->sortable('nama_depan')->paginate(10);

        $search_key = $request->search;
        $data_pegawai = Pegawai::when($request->search, function($query) use($request){
            $query->where('jabatan', 'LIKE', '%'.$request->search.'%');
        })->orWhereHas('User', function($query) use($request){
            $query->where('nama_depan', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_belakang', 'LIKE', '%'.$request->search.'%')
                ->orWhere('no_telp', 'LIKE', '%'.$request->search.'%');
        })->orWhereHas('Alamat', function($query) use($request){
            $query->whereHas('City', function($query) use($request){
                $query->where('name', 'LIKE', '%'.$request->search.'%');
            })->orWhereHas('District', function($query) use($request){
                $query->where('name', 'LIKE', '%'.$request->search.'%');
            })->orWhereHas('Village', function($query) use($request){
                $query->where('name', 'LIKE', '%'.$request->search.'%');
            });
        })->sortable('nama_depan')->paginate(10);


        // $data_pegawai = Pegawai::whereHas('User', function($query) use($request){
        //     $query->where('nama_depan', 'LIKE', '%'.$request->searchInput.'%')
        //         ->orWhere('nama_belakang', 'LIKE', '%'.$request->searchInput.'%')
        //         ->orWhere('no_telp', 'LIKE', '%'.$request->searchInput.'%');
        // })->sortable('nama_depan')->paginate(10);

        return view('admin.pegawai.index', compact('data_pegawai', 'search_key'));
    }

    public function add(){
        // Jawa Timur code = 35
        $data_user = User::where('role', 'user')->get();
        $data_kota = City::where('province_code', '=', 35)->get();

        return view('admin.pegawai.tambah', compact('data_user', 'data_kota'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'jabatan' => 'required',
            'desa' => 'required',
            'jumlah_order' =>  'required'
        ],[
            'user_id' => 'Pengguna tidak boleh kosong',
            'jabatan' => 'Jabatan tidak boleh kosong',
            'desa' => 'Alamat tidak boleh kosong',
            'jumlah_order' => 'Jumlah Order tidak boleh kosong'
        ]);

        $alamat = new Alamat;
        $alamat->kota_id = $request->kota;
        $alamat->distrik_id = $request->distrik;
        $alamat->desa_id = $request->desa;
        $alamat->save();

        $pegawai = new Pegawai;
        $pegawai->user_id = $request->user_id;
        $pegawai->alamat_id = $alamat->id;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jumlah_order = $request->jumlah_order;
        $pegawai->save();

        $user = User::find($request->user_id);
        $user->role = 'employee';
        $user->save();

        return redirect('/admin/pegawai/')->with('success', 'Data Pegawai Berhasil Ditambahkan!');
    }

    public function edit($id){
        $pegawai = Pegawai::find($id);
        $data_kota = City::where('province_code', '=', 35)->get();

        return view('admin.pegawai.ubah', compact('pegawai', 'data_kota'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'user_id' => 'required',
            'jabatan' => 'required',
            'desa' => 'required',
            'jumlah_order' =>  'required'
        ],[
            'user_id' => 'Pengguna tidak boleh kosong',
            'jabatan' => 'Jabatan tidak boleh kosong',
            'desa' => 'Alamat tidak boleh kosong',
            'jumlah_order' => 'Jumlah Order tidak boleh kosong'
        ]);

        $alamat = Alamat::find($id);
        $alamat->kota_id = $request->kota;
        $alamat->distrik_id = $request->distrik;
        $alamat->desa_id = $request->desa;
        $alamat->save();

        $pegawai = Pegawai::find($id);
        $pegawai->user_id = $request->user_id;
        $pegawai->alamat_id = $alamat->id;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jumlah_order = $request->jumlah_order;
        $pegawai->save();

        return redirect('/admin/pegawai/')->with('success', 'Data Pegawai Berhasil Diubah!');
    }

    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return redirect('/admin/pegawai/')->with('success', 'Data Pegawai Berhasil Dihapus!');
    }

    public function districts()
    {
        $city_id = request()->get('city_id');
        $city = City::find($city_id);
        $city_code = $city->code;
        $districts = District::where('city_code', '=', $city_code)->get();
        
        return response()->json($districts);
    }

    public function villages()
    {
        $district_id = request()->get('district_id');
        $district = District::find($district_id);
        $district_code = $district->code;
        $villages = Village::where('district_code', '=', $district_code)->get();
        
        return response()->json($villages);
    }

    // public function districts()
    // {
    //     //jombang id = 244 | code = 3517
    //     $city_id = request()->get('city_id');
    //     // $city_code = City::where('id', $city_id)->get('code'); ga error merah tapi return 0 data
    //     $city = City::find($city_id);
    //     $city_code = $city->code;
    //     $districts = District::where('city_code', '=', $city_code)->get();
        
    //     return response()->json($districts);
    // }

    // tampilkan berdasarkan select value kode
    // public function villages()
    // {
    //     $district_code = request()->get('district_code');
    //     $villages = Village::where('district_code', '=', $district_code)->get();
    //     return response()->json($villages);
    // }
}
