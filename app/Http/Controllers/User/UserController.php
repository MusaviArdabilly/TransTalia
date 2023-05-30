<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservasi;
use App\Models\ArmadaBus;
use App\Models\ReservasiArmadaBus;

class UserController extends Controller
{
    public function reservation(){
        $disableInput = false;
        $data_armada_bus = ArmadaBus::find([]);

        return view ('user.reservasi', compact('disableInput', 'data_armada_bus'));
    }

    public function reservationCheckBus(Request $request){
        $this->validate($request, [
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'kota_jemput' => 'required',
            'kota_tujuan' => 'required',
        ],[
            'tanggal_mulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Tanggal Selesai tidak boleh kosong',
            'kota_jemput.required' => 'Lokasi penjemputan tidak boleh kosong',
            'kota_tujuan.required' => 'Lokasi Tujuan tidak boleh kosong',
        ]);
        $disableInput = true;
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;
        $kota_jemput = $request->kota_jemput;
        $kota_tujuan = $request->kota_tujuan;

        $origin = urldecode("Mojoagung, Jombang Regency, East Java, Indonesia");
        $destination1 = urlencode($kota_jemput);
        $destination2 = urlencode($kota_tujuan);
        $api_key = "AIzaSyD3NfQbLS6VzWjfJqKAa-2UiHYyzAlfMRI";
        $url1 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination1&avoid=tolls&units=metric&key=$api_key";
        $url2 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$destination1&destinations=$destination2&avoid=tolls&units=metric&key=$api_key";

        $client = new Client();
        $response1 = $client->get($url1);
        $response2 = $client->get($url2);
        $data1 = json_decode($response1->getBody(), false); // param ke2 true=array false=obj
        $data2 = json_decode($response2->getBody(), false); // param ke2 true=array false=obj

        $distance_meter1 = $data1->rows[0]->elements[0]->distance->value;
        $distance_meter2 = $data2->rows[0]->elements[0]->distance->value;
        $distance_meter_total = $distance_meter1 + $distance_meter2;
        $jarak_rute = round($distance_meter_total / 1000); //pembulatan angka dibelakang koma

        $id_bus_terpakai = Reservasi::whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                                    ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                                    ->orWhere(function($query) use($tanggal_mulai, $tanggal_selesai){
                                        $query->where('tanggal_mulai', '<=', $tanggal_mulai)
                                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                                    })->pluck('id');
        $data_bus_tidak_terpakai = ArmadaBus::whereNotIn('id', function($query) use($id_bus_terpakai){
            $query->select('armada_bus_id')->from('reservasi_armada_bus')->whereIn('reservasi_id', $id_bus_terpakai);
        })->get();

        return view('user.reservasi', compact('disableInput', 'tanggal_mulai', 'tanggal_selesai', 'kota_jemput', 'kota_tujuan', 'jarak_rute', 'data_bus_tidak_terpakai'));
    }

    public function reservationCheckOut(Request $request){
        $this->validate($request, [
            'selected_armada_bus_id' => 'required',
        ],[
            'selected_armada_bus_id.required' => 'Silahkan memilih bus pariwisata terlebih dahulu',
        ]);
        $user_id = Auth::user()->id;
        // kode reservasi
        $user = User::find($user_id);
        $username = $user->nama_depan;
        $kode_reservasi = 'TRM-'.ucfirst($username).now()->format('ymdHis');
        //request - check out data
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;
        $kota_jemput = $request->kota_jemput;
        $kota_tujuan = $request->kota_tujuan;
        $jarak_rute = $request->jarak_rute;
        //request - retrieve selected bus
        $selected_bus = $request->selected_armada_bus_id;
        // get id each selected bus 
        $explode_selected_bus = explode('"', $selected_bus);
        $exploded_selected_bus = explode(', ', $explode_selected_bus[0]);
            // Create a new array with separate indexes
        $array_selected_bus = [];
        foreach ($exploded_selected_bus as $value) {
            $array_selected_bus[] = $value;
        }
        //find bus which is selected
        $data_selected_armada_bus = ArmadaBus::find([$array_selected_bus]);

        $sub_totals = [];
        $total_harga = 0;

        foreach ($data_selected_armada_bus as $armadaBus) {
            $harga_sewa_bus = $armadaBus->harga_sewa;
            $sub_total = $harga_sewa_bus * (2 * $jarak_rute); //2x jarak = pulang + pergi
            $sub_totals[] = $sub_total * 1.9; //subtotal x 1.9 karena biaya operasional = 90% dari biaya sewa bus 
            $total_harga += $sub_total * 1.9;
        }

        $startDate = Carbon::parse($tanggal_mulai);
        $endDate = Carbon::parse($tanggal_selesai);
        $duration = $endDate->diffInDays($startDate);


        // dd($jarak_rute, $data_selected_armada_bus, $harga_sewa_bus, $sub_total, $harga_total, $sub_totals);
            //logic untuk menentukan harga gmap apikey: AIzaSyD3NfQbLS6VzWjfJqKAa-2UiHYyzAlfMRI
        //hitung jarak antara kota penjemputan dan kota tujuan

        // $origin = urlencode($kota_jemput);
        // $destination = urlencode($kota_tujuan);
        // $api_key = "AIzaSyD3NfQbLS6VzWjfJqKAa-2UiHYyzAlfMRI";
        // $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=$origin&destinations=$destination&key=$api_key";

        // $client = new Client();
        // $response = $client->get($url);
        // $data = json_decode($response->getBody(), false); //param ke2 true=array false=obj
        
        // $distance_meter = $data->rows[0]->elements[0]->distance->value;
        // $distance_km = round($distance_meter / 1000); //pembulatan angka dibelakang koma
        

        return view ('user.reservasi-checkOut', compact('kode_reservasi', 'tanggal_mulai', 'tanggal_selesai', 'kota_jemput', 'kota_tujuan', 'jarak_rute', 'sub_totals', 'total_harga',  'data_selected_armada_bus'));
    }

    public function reservationStore(Request $request){
        $reservasi = new Reservasi;
        $reservasi->kode = $request->kode_reservasi;
        $reservasi->user_id = Auth::user()->id;
        $reservasi->tanggal_mulai = $request->tanggal_mulai;
        $reservasi->tanggal_selesai = $request->tanggal_selesai;
        $reservasi->kota_jemput = $request->kota_jemput;
        $reservasi->kota_tujuan = $request->kota_tujuan;
        $reservasi->total_harga = $request->total_harga;
        $reservasi->dibayar = 0;
        $reservasi->status = 'menunggu'; //status: 'menunggu', 'dibayar', 'lunas', 'batal'
        $reservasi->save();
        foreach($request->selected_armada_bus_id as $key => $id_armada_bus){
            // //store to event google calendar //store only if already paid
            // $armada_bus = ArmadaBus::find($id_armada_bus);
            // $event = new Event; //event from vendor gcal
            // $event->name = $armada_bus->nama .' - '. $request->kota_tujuan;
            // $event->startDateTime = Carbon::parse($request->tanggal_mulai)->setTime(8, 00, 01)->setTimezone('Asia/Jakarta');
            // $event->endDateTime = Carbon::parse($request->tanggal_selesai)->setTime(23, 59, 59)->setTimezone('Asia/Jakarta');
            // $event->save();
            $reservasi_armada_bus = new ReservasiArmadaBus;
            $reservasi_armada_bus->reservasi_id = $reservasi->id; 
            $reservasi_armada_bus->armada_bus_id = $id_armada_bus;
            $reservasi_armada_bus->sub_total = $request->sub_total[$key];
            $reservasi_armada_bus->save();
        }
        return redirect('/reservasi/riwayat')->with('success', 'Reservasi berhasil, data anda akan segera diproses');
    }

    public function reservationHistory(){
        $data_reservasi = Reservasi::where('user_id', Auth::user()->id)->paginate(5);
        

        return view ('user.riwayatreservasi', compact('data_reservasi'));
    }

    public function editAkun(){
        return view ('user.editAkun');
    }

    public function updateAkun(Request $request){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_telp' => 'required|exclude_if:no_telp,'.$user->no_telp.'|unique:users,no_telp',
            'email' => 'required|exclude_if:email,'.$user->email.'|unique:users,email',
        ],[
            'nama_depan.required' => 'Nama depan tidak boleh kosong',
            'nama_belakang.required' => 'Nama belakang tidak boleh kosong',
            'no_telp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp.unique' => 'Nomor Telepon sudah digunakan oleh pengguna lain',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain',
        ]);

        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $user->save();

        return redirect('/edit-akun')->with('success', 'Akun Berhasil Diperbarui');
    }

    public function editPassword(){
        return view ('user.editPassword');
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ],[
            'old_password.required' => 'Password lama tidak boleh kosong',
            'new_password.required' => 'Password baru tidak boleh kosong',
            'new_password.min' => 'Gunakan minimal 8 digit untuk password baru',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok',
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->back()->with('fail', 'Password Lama Salah');
        }

        $user_id = Auth::user()->id;

        $user = User::find($user_id);
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password Berhasil Diubah');
    }
}
