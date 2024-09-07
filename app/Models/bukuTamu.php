<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukuTamu extends Model
{
    use HasFactory;

    protected $table = 'buku_tamu';

    protected $primaryKey = 'no_buku_tamu';
    protected $fillable = ['nama_tamu', 'asal_instansi', 'alamat', 'no_hp', 'tanggal', 'keperluan'];
    public $timestamps = false;
}
