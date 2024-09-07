<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form.peminat.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'gelombang' => 'required',
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric', // Ensure unique NIK
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_wa_siswa' => 'required|numeric', // Ensure unique No WA
            'jalur_masuk' => 'required|in:Rapor,Prestasi Akademis,Non Akademis,Tahfidz,Minat Bakat',
            'jurusan_1' => 'required',
            'jurusan_2' => 'required',
            'status' => 'required', // Add the 'status' field to your validation rules
        ], [
            'gelombang.required' => 'Gelombang Wajib Dipilih!',
            'nama.required' => 'Nama Wajib di-isi!',
            'nisn.numeric' => 'NISN Harus Angka!',
            'nisn.required' => 'NISN Wajib Di-isi!',
            'nik.numeric' => 'NIK Harus Angka!',
            'nik.required' => 'NIK Wajib Di-isi!',
            'nik.unique' => 'NIK Sudah Terdaftar!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih!',
            'agama.required' => 'Agama Wajib Dipilih!',
            'tempat_lahir.required' => 'Tempat Lahir wajib ditentukan!',
            'tgl_lahir.required' => 'Tanggal Lahir wajib ditentukan!',
            'no_wa_siswa.numeric' => 'Nomor WA Harus Angka!',
            'no_wa_siswa.unique' => 'Nomor WA Sudah Terdaftar!',
            'no_wa_siswa.required' => 'Nomor WA Wajib Di-isi!',
            'jalur_masuk.required' => 'Jalur Masuk Wajib Dipilih!',
            'jurusan_1.required' => 'Jurusan Wajib dipilih!',
            'jurusan_2.required' => 'Jurusan Wajib dipilih!',
            'status.required' => 'Status Wajib Dipilih!', // Add the error message for 'status' field
        ]);

        $autoIncrementValuePeminat = DB::table('peminat')->max('no_reg');
        $autoIncrementValuePendaftar = DB::table('pendaftar')->max('no_reg');
        
        $existingRecordsCountPeminat = DB::table('peminat')->count();
        $existingRecordsCountPendaftar = DB::table('pendaftar')->count();
        
        if ($existingRecordsCountPeminat == 0 && $existingRecordsCountPendaftar == 0) {
            // If there are no existing records in both tables, use the default '24250' prefix
            $noReg = '24250' . sprintf('%04d', max($autoIncrementValuePeminat, $autoIncrementValuePendaftar) + 1);
        } else {
            // If there is at least one existing record in either table, use the highest auto-incremented value
            $noReg = max($autoIncrementValuePeminat, $autoIncrementValuePendaftar) + 1;
        }
        
        

        // Save data to session
        session([
            'no_reg' => $noReg,
            'gelombang' => $request->gelombang,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'asal_sekolah' => $request->asal_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_wa_siswa' => $request->no_wa_siswa,
            'jalur_masuk' => $request->jalur_masuk,
            'jurusan_1' => $request->jurusan_1,
            'jurusan_2' => $request->jurusan_2,
            'status' => $request->status,
        ]);

        // Save data to database
        Peminat::create(array_merge($request->all(), ['no_reg' => $noReg]));

        // Redirect to the pendaftar detail view
        return redirect()->route('form.peminat.show', $noReg)
            ->with('form_berhasil', 'Data Berhasil Ditambahkan.');
    }

    // ... (other methods)

    /**
     * Display the specified resource.
     */
    public function show(string $no_reg)
    {
        // Fetch the peminat data based on the provided $no_reg
        $data = Peminat::where('no_reg', $no_reg)->first();
    
        // Check if data is found
        if (!$data) {
            // If no data is found, redirect back to /form/peminat
            return redirect('/form/peminat')->with('error', 'Data not found');
        }
    
        // Pass the data to the peminat_table.blade.php view
        return view('dashboard.peminat.peminat_detail', compact('data'));
    }
}