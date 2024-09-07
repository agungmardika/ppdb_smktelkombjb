<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminat extends Model
{
    use HasFactory;

    protected $table = 'peminat';

    protected $primaryKey = 'no_reg';
    // Peminat model
    protected $fillable = [
        'no_reg', 'gelombang', 'nama', 'nisn', 'nik', 'asal_sekolah', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'no_wa_siswa', 'jalur_masuk', 'jurusan_1', 'jurusan_2', 'status'
    ];


    public $timestamps = false;
 
    
}
