<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nip' => '98220004',
            'nama_admin' => 'admin-ppdb',
            'username' => 'admin',
            'email' => 'admin-ppdb@gmail.com',
            'password' => Hash::make('admin123'),
            'created_at' => date('y-m-d H:i:s')
        ]);
    }
}
