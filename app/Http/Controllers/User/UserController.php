<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Reservasi;
use App\Models\ArmadaBus;
use App\Models\ReservasiArmadaBus;

class UserController extends Controller
{
    public function reservation(){
        $disableInput = false;
        $data_armada_bus = ArmadaBus::find([]);

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
                'borderColor' => '#000',
                'allDay' => true
            ];
        }

        return view ('user.reservasi', compact('disableInput', 'data_armada_bus', 'events'));
    }
        
    public static function getStatusColor($status){
        if ($status == 'menunggu'){
            return '#FFC107';
        }else {
            return '';
        }
    }

    public function reservationCheckBus(Request $request){
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
                'borderColor' => '#000',
                'allDay' => true
            ];
        }

        $this->validate($request, [
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'kota_jemput' => 'required',
            'kota_tujuan' => 'required',
        ],[
            'tanggal_mulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Tanggal Selesai tidak boleh kosong',
            'tanggal_mulai.date' => 'Pilih tanggal yang sudah disediakan',
            'tanggal_selesai.date' => 'Pilih tanggal yang sudah disediakan',
            'tanggal_selesai.after_or_equal' => 'Tanggal Selesai harus lebih dari atau sama dengan Tanggal Mulai',
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

        return view('user.reservasi', compact('disableInput', 'events', 'tanggal_mulai', 'tanggal_selesai', 'kota_jemput', 'kota_tujuan', 'jarak_rute', 'data_bus_tidak_terpakai'));
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
        $kode_reservasi = 'TRM'.now()->format('ymdHis');
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

        $startDate = Carbon::parse($tanggal_mulai);
        $endDate = Carbon::parse($tanggal_selesai)->addDay();
        $durasi = $endDate->diffInDays($startDate);

        //count sub_total and total_harga 
            //ambil data jarak, tujuan dan durasi 
            //apabila jawa timur
                //apabila durasinya 1 hari apabila jarak > 150km maka store sub_total dengan hitungan jarak, apabila jarak < 150km maka store data 3jt
                //apabila durasinya lebih dari 1 hari 
            //else
                //sewa per hari (2*4jt)
                //apabila jawa tengah && durasi > 2 hari 
                    //durasi*4jt + durasi-2 * 2jt 
                //apabila jawa barat && durasi > 4 hari 
                    //durasi*4jt + durasi-4 * 2jt
        $sub_totals = [];
        $total_harga = 0;
        
        if(Str::contains(Str::lower($kota_tujuan), Str::lower('Jawa Timur'))){
            if($durasi == 1){
                if($jarak_rute < 150){
                    //sub_total = 3jt
                    foreach ($data_selected_armada_bus as $armadaBus) {
                        $harga_sewa_bus = 3000000;
                        $sub_total = $harga_sewa_bus;
                        $sub_totals[] = $sub_total;
                        $total_harga += $sub_total;
                    }
                }else{
                    //pakai rumus jarak
                    foreach ($data_selected_armada_bus as $armadaBus) {
                        $harga_sewa_bus = $armadaBus->harga_sewa;
                        $sub_total = $harga_sewa_bus * (2 * $jarak_rute);
                        $sub_totals[] = $sub_total;
                        $total_harga += $sub_total;
                    }
                }
            }else{
                //$durasi * 4jt
                if($jarak_rute < 150){
                    //sub_total = 3jt
                    foreach ($data_selected_armada_bus as $armadaBus) {
                        $harga_sewa_bus = 3000000;
                        $sub_total = $harga_sewa_bus + ($durasi * ($harga_sewa_bus / 2));
                        $sub_totals[] = $sub_total;
                        $total_harga += $sub_total;
                    }
                }else{
                    //pakai rumus jarak
                    foreach ($data_selected_armada_bus as $armadaBus) {
                        $harga_sewa_bus = $armadaBus->harga_sewa;
                        $harga_sewa_bus_tambahan = ($durasi - 1) * (($harga_sewa_bus * (2 * $jarak_rute)) / 2);
                        $sub_total = $harga_sewa_bus * (2 * $jarak_rute) + $harga_sewa_bus_tambahan;
                        $sub_totals[] = $sub_total;
                        $total_harga += $sub_total;
                    }
                }
            }
        }elseif(Str::contains(Str::lower($kota_tujuan), Str::lower('Jawa Tengah')) || Str::contains(Str::lower($kota_tujuan), Str::lower('Daerah Istimewa Yogyakarta'))){
            if($durasi >= 1 && $durasi <= 2){
                //subtotal = 2 * 4jt
                foreach ($data_selected_armada_bus as $armadaBus) {
                    $harga_sewa_bus = $armadaBus->harga_sewa;
                    $sub_total = $harga_sewa_bus * (2 * $jarak_rute);
                    $sub_totals[] = $sub_total;
                    $total_harga += $sub_total;
                }
            }else{
                //subtotal = ($durasi * 4jt) + ($durasi * 2jt)
                foreach ($data_selected_armada_bus as $armadaBus) {
                    // $harga_sewa_bus = 4000000; //BINGUNG BUS KECIL BESAR
                    $harga_sewa_bus = $armadaBus->harga_sewa;
                    $harga_sewa_bus_tambahan = 2000000;
                    $sub_total = $harga_sewa_bus * (2 * $jarak_rute) + $harga_sewa_bus_tambahan;
                    $sub_totals[] = $sub_total;
                    $total_harga += $sub_total;
                }
            }
        }elseif(Str::contains(Str::lower($kota_tujuan), Str::lower('Jawa Barat')) || Str::contains(Str::lower($kota_tujuan), Str::lower('Daerah Khusus Ibukota')) || Str::contains(Str::lower($kota_tujuan), Str::lower('Banten'))){
            if($durasi >= 1 && $durasi <= 4){
                //subtotal = 4 * 4jt
                foreach ($data_selected_armada_bus as $armadaBus) {
                    $harga_sewa_bus = $armadaBus->harga_sewa;
                    $sub_total = $harga_sewa_bus * (2 * $jarak_rute);
                    $sub_totals[] = $sub_total;
                    $total_harga += $sub_total;
                }
            }else{
                //subtotal = ($durasi * 4jt) + ($duration *2jt)
                foreach ($data_selected_armada_bus as $armadaBus) {
                    // $harga_sewa_bus = 4000000; //BINGUNG BUS KECIL BESAR
                    // $harga_sewa_bus_tambahan = ($durasi - 4) * (($harga_sewa_bus * (2 * $jarak_rute)) / 2);
                    $harga_sewa_bus = $armadaBus->harga_sewa;
                    $harga_sewa_bus_tambahan = 2000000;
                    $sub_total = $harga_sewa_bus * (2 * $jarak_rute) + $harga_sewa_bus_tambahan;
                    $sub_totals[] = $sub_total;
                    $total_harga += $sub_total;
                }
            }
        }

        // return $sub_totals;
        return view ('user.reservasi-checkOut', compact('kode_reservasi', 'tanggal_mulai', 'tanggal_selesai', 'kota_jemput', 'kota_tujuan', 'jarak_rute', 'sub_totals', 'total_harga',  'data_selected_armada_bus', 'durasi'));
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
            $reservasi_armada_bus = new ReservasiArmadaBus;
            $reservasi_armada_bus->reservasi_id = $reservasi->id; 
            $reservasi_armada_bus->armada_bus_id = $id_armada_bus;
            $reservasi_armada_bus->sub_total = $request->sub_total[$key];
            $reservasi_armada_bus->save();
        }
        $user_pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        if($user_pegawai){
            $user_pegawai->jumlah_order += 1;
            $user_pegawai->save();
        }
        return redirect('/reservasi/riwayat')->with('success', 'Reservasi berhasil, data anda akan segera diproses');
    }

    public function reservationHistory(){
        $data_reservasi = Reservasi::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        

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
