<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $primaryKey = 'id_pendaftar';
    protected $fillable = ['no_reg','gelombang', 'nama', 'nisn', 'nik', 'asal_sekolah', 'jenis_kelamin', 'agama', 'tempat_lahir','tgl_lahir', 'no_wa_siswa', 'jalur_masuk', 'jurusan_1', 'jurusan_2','dokumen_akta','dokumen_ktp_ortu','dokumen_kk','dokumen_rapor','status'];
    public $timestamps = false;
}

