<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DaftarUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = DaftarUlang::where('nama', 'like', "%$katakunci%")
                ->orWhere('nisn', 'like', "%$katakunci%")
                ->paginate(4);
        } else {
            $data = DaftarUlang::orderBy('id_pendaftar', 'asc')->paginate(4);
        }

        $data = DaftarUlang::where('status', 'Daftar Ulang')->paginate(4);
        return view('dashboard.daftarulang.table')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.daftarulang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_pendaftar', $request->id_pendaftar);
        Session::flash('no_reg', $request->no_reg);
        Session::flash('gelombang', $request->gelombang);
        Session::flash('nama', $request->nama);
        Session::flash('nisn', $request->nisn);
        Session::flash('nik', $request->nik);
        Session::flash('asal_sekolah', $request->asal_sekolah);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('agama', $request->agama);
        Session::flash('tempat_lahir', $request->tempat_lahir);
        Session::flash('tgl_lahir', $request->tgl_lahir);
        Session::flash('no_wa_siswa', $request->no_wa_siswa);
        Session::flash('jalur_masuk', $request->jalur_masuk);
        Session::flash('jurusan_1', $request->jurusan_1);
        Session::flash('jurusan_2', $request->jurusan_2);
        Session::flash('dokumen_akta', $request->dokumen_akta);
        Session::flash('dokumen_ktp_ortu', $request->dokumen_ktp_ortu);
        Session::flash('dokumen_kk', $request->dokumen_kk);
        Session::flash('dokumen_rapor', $request->dokumen_rapor);


        $request->validate([
            'gelombang' => 'required',
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_wa_siswa' => 'required|numeric',
            'jalur_masuk' => 'required|in:Rapor,Prestasi Akademis,Non Akademis,Tahfidz,Minat Bakat',
            'jurusan_1' => 'required',
            'jurusan_2' => 'required',
            'dokumen_akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_ktp_ortu' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_rapor' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
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
            'no_wa_siswa.required' => 'Nomor WA Wajib Di-isi!',
            'jalur_masuk.required' => 'Jalur Masuk Wajib Dipilih!',
            'jurusan_1.required' => 'Jurusan Wajib dipilih!',
            'jurusan_2.required' => 'Jurusan Wajib dipilih!',
            'dokumen_akta.required' => 'Dokumen Akta wajib di upload!',
            'dokumen_ktp_ortu.required' => 'Dokumen KTP Orang Tua wajib di upload!',
            'dokumen_kk.required' => 'Dokumen KK wajib di upload!',
            'dokumen_rapor.required' => 'Dokumen Rapor wajib di upload!',
        ]);

        $data = [
            'id_pendaftar' => $request->id_pendaftar,
            'no_reg' => $request->no_reg,
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
            'dokumen_akta' => $request->dokumen_akta,
            'dokumen_ktp_ortu' => $request->dokumen_ktp_ortu,
            'dokumen_kk' => $request->dokumen_kk,
            'dokumen_rapor' => $request->dokumen_rapor,
            'status' => $request->status,
        ];

        DaftarUlang::create($data);
        return redirect()->to('/table/daftarulang')->with('success', 'Data Berhasil Di-tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DaftarUlang::where('id_pendaftar', $id)->first();
        return view('dashboard.daftarulang.edit')->with('data', $data);
    }


    public function update(Request $request, string $id)

    {
        
        $data = $request->validate([
            'id_pendaftar' => '',
            'no_reg' => '',
            'gelombang' => 'required',
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_wa_siswa' => 'required|numeric',
            'jalur_masuk' => 'required|in:Rapor,Prestasi Akademis,Non Akademis,Tahfidz,Minat Bakat',
            'jurusan_1' => 'required',
            'jurusan_2' => 'required',
            'dokumen_akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_ktp_ortu' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'dokumen_rapor' => 'nullable|file|mimes:jpg,jpeg,png,pdf', 
            'status' => 'required|in:Peminat,Pendaftar,Daftar Ulang',
        ], [
            'no_reg.required' => 'No Registrasi Wajib Di-isi!',
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
            'no_wa_siswa.required' => 'Nomor WA Wajib Di-isi!',
            'jalur_masuk.required' => 'Jalur Masuk Wajib Dipilih!',
            'jurusan_1.required' => 'Jurusan Wajib dipilih!',
            'jurusan_2.required' => 'Jurusan Wajib dipilih!',
            'dokumen_akta.required' => 'Dokumen Akta wajib di upload!',
            'dokumen_ktp_ortu.required' => 'Dokumen KTP Orang Tua wajib di upload!',
            'dokumen_kk.required' => 'Dokumen KK wajib di upload!',
            'dokumen_rapor.required' => 'Dokumen Rapor wajib di upload!',
        ]);
        DaftarUlang::where('id_pendaftar', $id)->update($data);
        return redirect('/table/daftarulang')->with('success', 'Data Berhasil Diedit');
    }


    public function destroy(string $id)
    {
        DaftarUlang::where('id_pendaftar', $id)->delete();
        return redirect('/table/daftarulang')->with('success', 'Data Berhasil Dihapus');
    }


}


