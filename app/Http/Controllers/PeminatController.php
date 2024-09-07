<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminat;
use App\Models\pendaftar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class PeminatController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Peminat::where('nama', 'like', "%$katakunci%")
                ->orWhere('nisn', 'like', "%$katakunci%")
                ->paginate(4);
        } else {
            $data = Peminat::orderBy('no_reg', 'asc')->paginate(4);
        }

        return view('dashboard.peminat.table')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.peminat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Get the latest record from peminat table based on the primary key (id)
        // $latestPeminat = Peminat::latest('id')->first();

        // // If there are no existing records, set the initial no_reg value
        // $latestNoReg = $latestPeminat ? $latestPeminat->no_reg : '24250001';

        // // Increment the no_reg value
        // $newNoReg = str_pad((intval($latestNoReg) + 1), 7, '0', STR_PAD_LEFT);

        // // Use the new no_reg value for the current record
        // $request->merge(['no_reg' => $newNoReg]);


        // Validation and flashing data
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
            'status' => 'required|in:Peminat,Pendaftar,Daftar Ulang',
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

        // Create the data array
        $data = [
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
            'status' => $request->status,
        ];

        // Create a new Peminat record
        Peminat::create($data);

        // Redirect with success message
        return redirect()->to('/table/peminat')->with('success', 'Data Berhasil Ditambahkan.');
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
        $data = Peminat::where('no_reg', $id)->first();
        return view('dashboard.peminat.edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
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
            'dokumen_akta' => 'nullable|file|mimes:pdf',
            'dokumen_ktp_ortu' => 'nullable|file|mimes:pdf',
            'dokumen_kk' => 'nullable|file|mimes:pdf',
            'dokumen_rapor' => 'nullable|file|mimes:pdf',
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

        // Check if the status is updated to "Pendaftar"
        if ($request->input('status') === 'Pendaftar') {
            // Move the record to Pendaftar
            $peminat = Peminat::findOrFail($id);

            // Explicitly set the status to 'Pendaftar' when creating the new record
            Pendaftar::create(array_merge($peminat->toArray(), ['status' => 'Pendaftar']));

            // Delete the record from Peminat
            $peminat->delete();

            // Redirect to the Pendaftar table with success message
            return redirect('/table/peminat')->with('success', 'Data Berhasil Diedit');
        }

        // If the status is not "Pendaftar", update the Peminat record
        $data = [
            'gelombang' => $request->input('gelombang'),
            'nama' => $request->input('nama'),
            'nisn' => $request->input('nisn'),
            'nik' => $request->input('nik'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_wa_siswa' => $request->input('no_wa_siswa'),
            'jalur_masuk' => $request->input('jalur_masuk'),
            'jurusan_1' => $request->input('jurusan_1'),
            'jurusan_2' => $request->input('jurusan_2'),
            'status' => $request->input('status'),
        ];

        $peminat = Peminat::findOrFail($id);
        $peminat->update($data);

        // Redirect to the Peminat table with success message
        return redirect('/table/peminat')->with('success', 'Data Berhasil Diedit');
    }










    public function destroy(string $id)
    {
        peminat::where('no_reg', $id)->delete();
        return redirect('/table/peminat')->with('success', 'Data Berhasil Dihapus');
    }

    // public function moveToPendaftar(Request $request)
    // {
    //     // Check if selected_peminat is set and is an array
    //     if ($request->has('selected_peminat') && is_array($request->selected_peminat)) {
    //         // Get selected records from Peminat
    //         $selectedPeminat = Peminat::whereIn('no_reg', $request->selected_peminat)->get();

    //         // Check if any records are selected
    //         if ($selectedPeminat->count() > 0) {
    //             // Move records to Pendaftar if the status is not "Pendaftar"
    //             foreach ($selectedPeminat as $peminat) {
    //                 if ($peminat->status !== 'Pendaftar') {
    //                     $pendaftarData = $peminat->toArray();
    //                     $pendaftarData['status'] = 'Pendaftar';
    //                     Pendaftar::create($pendaftarData);
    //                 }
    //             }

    //             // Delete selected records from Peminat
    //             Peminat::whereIn('no_reg', $request->selected_peminat)->delete();

    //             // Redirect to the appropriate route
    //             return redirect('/table/peminat')->with('success', 'Selected records moved to Pendaftar.');
    //         } else {
    //             // No records selected, handle this case (e.g., show an error message)
    //             return redirect('/table/peminat')->with('error', 'No records selected to move.');
    //         }
    //     } else {
    //         // Handle the case where selected_peminat is not set or not an array
    //         return redirect('/table/peminat')->with('error', 'Invalid request. Please select records to move.');
    //     }
    // }

}
