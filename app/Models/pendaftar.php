<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $primaryKey = 'id_pendaftar';
 // Pendaftar model
protected $fillable = ['no_reg', 'gelombang', 'nama', 'nisn', 'nik', 'asal_sekolah', 'jenis_kelamin', 'agama', 'tempat_lahir','tgl_lahir', 'no_wa_siswa', 'jalur_masuk', 'jurusan_1', 'jurusan_2','dokumen_akta','dokumen_ktp_ortu','dokumen_kk','dokumen_rapor','status'];

    public $timestamps = false;
 // or specify fillable fields
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         // Generate default value for no_reg
    //         $model->no_reg = '2425000' . static::generateAutoIncrement();
    //     });
    // }

    // /**
    //  * Generate auto-increment based on existing records.
    //  */
    // protected static function generateAutoIncrement()
    // {
    //     $latestRecord = static::latest('no_reg')->first();

    //     if ($latestRecord) {
    //         // Extract the numeric part of no_reg, increment, and pad with zeros
    //         $numericPart = (int)substr($latestRecord->no_reg, 7);
    //         $nextValue = $numericPart + 1;

    //         return str_pad($nextValue, 4, '0', STR_PAD_LEFT);
    //     } else {
    //         // If no existing records, start with 1
    //         return '1';
    //     }
    // }



}
