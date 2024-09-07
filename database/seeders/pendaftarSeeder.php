<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('pendaftar')->insert([
                'no_reg' => '24250002',
                'gelombang' => '2',
                'nama' => 'MOHAMMAD AGUNG DWI MAHARDIKA',
                'nisn' => '8722746573',
                'nik' => '9997627331628453',
                'asal_sekolah' => 'SMPN 4 BANJARBARU',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'tempat_lahir'=>'BANJARBARU',
                'tgl_lahir' => date('2007-09-13'),
                'no_wa_siswa' => '086625347465',
                'jalur_masuk' => 'Rapor',
                'jurusan_1' => 'RPL',
                'jurusan_2' => 'Animasi',
                'status' => 'Pendaftar'
            ]);
        }
    }
}
