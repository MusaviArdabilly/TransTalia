<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function reservation(){
        return view ('user.reservasi');
    }

    public function reservationHistory(){
        return view ('user.riwayatreservasi');
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
