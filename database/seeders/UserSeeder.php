<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Record 1
        User::create([
            //Record 1
            'nama_depan' => 'Farhan', 
            'nama_belakang' => 'Maulana', 
            'role' => 'user', 
            'foto_profil' => 'default_ava.png', 
            'no_telp' => '081234567890', 
            'email' => 'farhan.maulana@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 2
        User::create([
            'nama_depan' => 'Putra', 
            'nama_belakang' => 'Pratama', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '085678901234', 
            'email' => 'putrapratama@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 3
        User::create([
            'nama_depan' => 'Rizki', 
            'nama_belakang' => 'Wijaya', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '082345678901', 
            'email' => ' rizkiwijaya@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 4
        User::create([
            'nama_depan' => 'Ahmad', 
            'nama_belakang' => 'Hidayat', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '081345678901', 
            'email' => ' ahmadhidayat@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 5
        User::create([
            'nama_depan' => 'Dika', 
            'nama_belakang' => 'Santoso', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '085789012345', 
            'email' => 'dikasantoso@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 6
        User::create([
            'nama_depan' => 'Gilang', 
            'nama_belakang' => 'Pramudya', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '082334567890', 
            'email' => ' gilang.pramudya@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 7
        User::create([
            'nama_depan' => 'Agus', 
            'nama_belakang' => 'Setiawan', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '081367890123', 
            'email' => 'agussetiawan@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 8
        User::create([
            'nama_depan' => 'Budi', 
            'nama_belakang' => 'Nugroho', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '085634567890', 
            'email' => 'budinugroho@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 9
        User::create([
            'nama_depan' => 'Hendra', 
            'nama_belakang' => 'Prabowo', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '082390123456', 
            'email' => 'hendra.prabowo@gmail.com', 
            'password' => bcrypt('password')
        ]);
        //Record 10
        User::create([
            'nama_depan' => 'Irfan', 
            'nama_belakang' => 'Mahendra', 
            'foto_profil' => 'default_ava.png', 
            'role' => 'user', 
            'no_telp' => '081278901234', 
            'email' => 'irfan_mahendra@gmail.com', 
            'password' => bcrypt('password')
        ]);   
    }
}
