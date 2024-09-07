<?php

namespace App\Http\Controllers;

use App\Models\pendaftar;
use App\Models\Peminat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// public function index(Request $request)
// {
//     $katakunci = $request->katakunci;

//     // Use Eloquent query builder on the 'pendaftar' table
//     $query = Pendaftar::leftJoin('peminat', 'peminat.no_reg', '=', 'pendaftar.no_reg')
//         ->select('pendaftar.*', 'peminat.nama as peminat_nama', 'peminat.nisn as peminat_nisn')
//         ->where('peminat.status', 'Pendaftar');

//     if (strlen($katakunci)) {
//         // Add WHERE conditions if search keyword is provided
//         $query->where('peminat.nama', 'like', "%$katakunci%")
//             ->orWhere('peminat.nisn', 'like', "%$katakunci%");
//     }

//     // Paginate the query builder result, not the collection
//     $data = $query->paginate(4);

//     return view('dashboard.pendaftar.table')->with('data', $data);
// }

public function index(Request $request)
{
    $katakunci = $request->katakunci;
    if (strlen($katakunci)) {
        $data = pendaftar::where('nama', 'like', "%$katakunci%")
            ->orWhere('nisn', 'like', "%$katakunci%")
            ->paginate(4);
    } else {
        $data = pendaftar::orderBy('id_pendaftar', 'asc')->paginate(4);
    }

    $data = pendaftar::where('status', 'Pendaftar')->paginate(4);
    return view('dashboard.pendaftar.table')->with('data', $data);
}

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pendaftar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $imageNameDokumenAkta = null;
        $imageNameKtpOrtu = null;
        $imageNameKk = null;
        $imageNameRapor = null;

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
        Session::flash('dokumen_akta', $imageNameDokumenAkta);
        Session::flash('dokumen_ktp_ortu', $imageNameKtpOrtu);
        Session::flash('dokumen_kk', $imageNameKk);
        Session::flash('dokumen_rapor', $imageNameRapor);

        

        $request->validate([
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
            'dokumen_akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'dokumen_ktp_ortu' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'dokumen_kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'dokumen_rapor' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
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

        if ($request->hasFile('dokumen_akta')) {
            $imageNameDokumenAkta = 'dokumen_akta' . time() . '.' . $request->dokumen_akta->extension();
            $request->dokumen_akta->storeAs('public/dokumen_akta', $imageNameDokumenAkta);
        }
        
        if ($request->hasFile('dokumen_ktp_ortu')) {
            $imageNameKtpOrtu = 'dokumen_ktp_ortu' . time() . '.' . $request->dokumen_ktp_ortu->extension();
            $request->dokumen_ktp_ortu->storeAs('public/dokumen_ktp_ortu', $imageNameKtpOrtu);
        }
        
        if ($request->hasFile('dokumen_kk')) {
            $imageNameKk = 'dokumen_kk' . time() . '.' . $request->dokumen_kk->extension();
            $request->dokumen_kk->storeAs('public/dokumen_kk', $imageNameKk);
        }

        if ($request->hasFile('dokumen_rapor')) {
            $imageNameRapor = 'dokumen_rapor' . time() . '.' . $request->dokumen_rapor->extension();
            $request->dokumen_rapor->storeAs('public/dokumen_rapor', $imageNameRapor);
        }
        
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
            'dokumen_akta' => $imageNameDokumenAkta,
            'dokumen_ktp_ortu' => $imageNameKtpOrtu,
            'dokumen_kk' => $imageNameKk,
            'dokumen_rapor' => $imageNameRapor,
            'status' => 'Pendaftar',
        ];

        

        pendaftar::create($data);
        return redirect()->to('/table/pendaftar')->with('success', 'Data Berhasil Di-tambahkan.');
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
        $data = pendaftar::where('id_pendaftar', $id)->first();
        return view('dashboard.pendaftar.edit')->with('data', $data);
    }


    public function update(Request $request, string $id)
    {
        $imageNameDokumenAkta = null;
        $imageNameKtpOrtu = null;
        $imageNameKk = null;
        $imageNameRapor = null;
    
        if ($request->hasFile('dokumen_akta')) {
            $imageNameDokumenAkta = 'dokumen_akta' . time() . '.' . $request->dokumen_akta->extension();
            $request->dokumen_akta->storeAs('public/dokumen_akta', $imageNameDokumenAkta);
        }
    
        if ($request->hasFile('dokumen_ktp_ortu')) {
            $imageNameKtpOrtu = 'dokumen_ktp_ortu' . time() . '.' . $request->dokumen_ktp_ortu->extension();
            $request->dokumen_ktp_ortu->storeAs('public/dokumen_ktp_ortu', $imageNameKtpOrtu);
        }
    
        if ($request->hasFile('dokumen_kk')) {
            $imageNameKk = 'dokumen_kk' . time() . '.' . $request->dokumen_kk->extension();
            $request->dokumen_kk->storeAs('public/dokumen_kk', $imageNameKk);
        }

        if ($request->hasFile('dokumen_rapor')) {
            $imageNameRapor = 'dokumen_rapor' . time() . '.' . $request->dokumen_rapor->extension();
            $request->dokumen_rapor->storeAs('public/dokumen_rapor', $imageNameRapor);
        }
    
        $status = $request->input('status');
        $requiredFields = ($status === 'Daftar Ulang') ? 'required|' : '';
    
        $data =         $request->validate([
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
    
        // Check if the status is updated to "Peminat"
        if ($status === 'Peminat') {
            // Move the record to Peminat
            $pendaftar = Pendaftar::findOrFail($id);
            Peminat::create(array_merge($pendaftar->toArray(), ['status' => 'Peminat']));
            // Delete the record from Pendaftar
            $pendaftar->delete();
        } elseif ($status === 'Daftar Ulang') {
            // Check if all required fields are filled
            $missingFields = collect($data)->filter(function ($value, $key) use ($requiredFields) {
                return Str::contains($requiredFields, $key) && empty($value);
            });
    
            if ($missingFields->isNotEmpty()) {
                return redirect()->back()->withErrors(['error' => 'Please fill in all required fields for "Daftar Ulang"'])->withInput();
            }
    
            // Update the Pendaftar record
            $data['dokumen_akta'] = $imageNameDokumenAkta;
            $data['dokumen_ktp_ortu'] = $imageNameKtpOrtu;
            $data['dokumen_kk'] = $imageNameKk;
            $data['dokumen_rapor'] = $imageNameRapor;
            Pendaftar::where('id_pendaftar', $id)->update($data);
            return redirect('/table/pendaftar')->with('success', 'Data Berhasil Diedit');
        }
    
        // Update the Pendaftar record for other statuses
        $data['dokumen_akta'] = $imageNameDokumenAkta;
        $data['dokumen_ktp_ortu'] = $imageNameKtpOrtu;
        $data['dokumen_kk'] = $imageNameKk;
        $data['dokumen_rapor'] = $imageNameRapor;
        Pendaftar::where('id_pendaftar', $id)->update($data);
        return redirect('/table/pendaftar')->with('success', 'Data Berhasil Diedit');
    }
    
    
    
    


    public function destroy(string $id)
    {
        pendaftar::where('id_pendaftar', $id)->delete();
        return redirect('/table/pendaftar')->with('success', 'Data Berhasil Dihapus');
    }

    public function getCount()
{
    try {
        $count = Pendaftar::count();
        return response()->json(['count' => $count]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}


    // public function viewUploadedFiles()
    // {
    //     $uploadedFiles = Session::get('uploaded_files');
    
    //     if ($uploadedFiles) {
    //         // Pastikan file tersedia sebelum mencoba mengaksesnya
    //         if (isset($uploadedFiles['dokumen_akta']) && isset($uploadedFiles['dokumen_ktp_ortu']) && isset($uploadedFiles['dokumen_kk'])) {
    //             $pathToDokumenAkta = storage_path('app/public/dokumen_akta/' . $uploadedFiles['dokumen_akta']);
    //             $pathToKtpOrtu = storage_path('app/public/dokumen_ktp_ortu/' . $uploadedFiles['dokumen_ktp_ortu']);
    //             $pathToKk = storage_path('app/public/dokumen_kk/' . $uploadedFiles['dokumen_kk']);
    
    //             // Gunakan $pathToDokumenAkta, $pathToKtpOrtu, dan $pathToKk sesuai kebutuhan aplikasi Anda
    //         } else {
    //             // Handle jika salah satu atau semua file tidak tersedia
    //             return redirect('/table/pendaftar')->with('error', 'File yang diunggah tidak tersedia.');
    //         }
    //     } else {
    //         // Handle jika data tidak ditemukan
    //         return redirect('/table/pendaftar')->with('error', 'Data tidak ditemukan.');
    //     }
    
    //     // Kode lanjutan di sini...
    // }

}


