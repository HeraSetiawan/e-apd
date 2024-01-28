<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
           'nama_lengkap' => 'IT Support', 
           'nik' => 'it43210',
           'email' => 'instruktur.laravel@gmail.com',
           'role' => 'SA',
           'password' => Hash::make('superadmin1234'), 
        ]);
    }
}
