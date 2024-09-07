<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Enum;

class PeminatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminat')->insert([
            'no_reg' => '24250001',
            'gelombang' => '2',
            'nama' => 'ALFANDI HASSAN',
            'nisn' => '123456789',
            'nik' => '1234567',
            'asal_sekolah' => 'SMP JAKLINGKO 2',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'tempat_lahir' => 'SURABAYA',
            'tgl_lahir' => date('2007-02-25'),
            'no_wa_siswa' => '08172362842',
            'jalur_masuk' => 'Non Akademis',
            'jurusan_1' => 'RPL',
            'jurusan_2' => 'DKV',
            'status' => 'Peminat'
        ]);
    }
}
