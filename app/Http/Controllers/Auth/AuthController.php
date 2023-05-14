<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.exists' => 'Email tidak terdaftar',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/')->with('success', 'Login Berhasil');
        }
        return redirect()->back()->with('fail', 'Password salah')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }
    
    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_telp' => 'required|unique:users,no_telp',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ],[
            'nama_depan.required' => 'Nama depan tidak boleh kosong',
            'nama_belakang.required' => 'Nama belakang tidak boleh kosong',
            'no_telp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp.unique' => 'Nomor Telepon sudah terdaftar',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Gunakan password minimal 8 digit',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        $user = new User;
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->foto_profil = 'default_ava.png';
        $user->role = 'user';
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
