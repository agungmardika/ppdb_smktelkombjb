<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bukuTamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_tamu')->insert([
            'no_buku_tamu' => '005',
            'nama_tamu' => 'Amar',
            'asal_instansi' => 'Mocca Studio',
            'alamat' => 'Malang, Jawa Timur',
            'no_hp' => '083844870780',
            'tanggal' => date('2023-09-09'),
            'keperluan' => 'Menanyakan perihal pendaftaran',
        ]);
    }
}
