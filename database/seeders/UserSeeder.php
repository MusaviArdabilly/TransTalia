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
            'no_telp' => '081234567890', 
            'email' => 'farhan.maulana@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 2
            'nama_depan' => 'Putra', 
            'nama_belakang' => 'Pratama', 
            'role' => 'user', 
            'no_telp' => '085678901234', 
            'email' => 'putrapratama@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 3
            'nama_depan' => 'Rizki', 
            'nama_belakang' => 'Wijaya', 
            'role' => 'user', 
            'no_telp' => '082345678901', 
            'email' => ' rizkiwijaya@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 4
            'nama_depan' => 'Ahmad', 
            'nama_belakang' => 'Hidayat', 
            'role' => 'user', 
            'no_telp' => '081345678901', 
            'email' => ' ahmadhidayat@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 5
            'nama_depan' => 'Dika', 
            'nama_belakang' => 'Santoso', 
            'role' => 'user', 
            'no_telp' => '085789012345', 
            'email' => 'dikasantoso@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 6
            'nama_depan' => 'Gilang', 
            'nama_belakang' => 'Pramudya', 
            'role' => 'user', 
            'no_telp' => '082334567890', 
            'email' => ' gilang.pramudya@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 7
            'nama_depan' => 'Agus', 
            'nama_belakang' => 'Setiawan', 
            'role' => 'user', 
            'no_telp' => '081367890123', 
            'email' => 'agussetiawan@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 8
            'nama_depan' => 'Budi', 
            'nama_belakang' => 'Nugroho', 
            'role' => 'user', 
            'no_telp' => '085634567890', 
            'email' => 'budinugroho@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 9
            'nama_depan' => 'Hendra', 
            'nama_belakang' => 'Prabowo', 
            'role' => 'user', 
            'no_telp' => '082390123456', 
            'email' => 'hendra.prabowo@gmail.com', 
            'password' => bcrypt('password')
        ],[
            //Record 10
            'nama_depan' => 'Irfan', 
            'nama_belakang' => 'Mahendra', 
            'role' => 'user', 
            'no_telp' => '081278901234', 
            'email' => 'irfan_mahendra@gmail.com', 
            'password' => bcrypt('password')
        ]);
    }
}
