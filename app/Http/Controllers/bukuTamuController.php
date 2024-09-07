<?php

namespace App\Http\Controllers;

use App\Models\bukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class bukuTamuController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = bukuTamu::where('no_buku_tamu', 'like', "%$katakunci%")
                ->orWhere('nama_tamu', 'like', "%$katakunci%")
                ->paginate(4);
        } else {
            $data = bukuTamu::orderBy('no_buku_tamu', 'asc')->paginate(4);
        }

        return view('dashboard.buku_tamu.tableBukuTamu')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku_tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('no_buku_tamu', $request->no_buku_tamu);
        Session::flash('nama_tamu', $request->nama_tamu);
        Session::flash('asal_instansi', $request->asal_instansi);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('keperluan', $request->keperluan);



        $request->validate([
            'nama_tamu' => 'required',
            'asal_instansi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'tanggal' => 'required',
            'keperluan' => 'required',
        ], [
            'nama_tamu.required' => 'Nama tamu Wajib Diisi!',
            'asal_instansi.required' => 'Asal instansi Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'no_hp.required' => 'No hp Wajib Diisi',
            'no_hp.numeric' => 'No hp Wajib Diisi',
            'tanggal.required' => ' Tanggal Wajib Diisi',
            'keperluan.required' => 'keperluan Wajib Diisi',
        ]);

        $data = [
            'no_buku_tamu' => $request->no_buku_tamu,
            'nama_tamu' => $request->nama_tamu,
            'asal_instansi' => $request->asal_instansi,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'keperluan' => $request->keperluan,
        ];

        bukuTamu::create($data);
        return redirect()->to('/table/bukutamu')->with('success', 'Data Berhasil Di-tambahkan.');
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
        $data = bukuTamu::where('no_buku_tamu', $id)->first();
        return view('dashboard.buku_tamu.edit')->with('data', $data);
    }


    public function update(Request $request, string $id)

    {
        $data = $request->validate([
            'nama_tamu' => 'required',
            'asal_instansi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'tanggal' => 'required',
            'keperluan' => 'required',
        ], [
            'nama_tamu.required' => 'Nama tamu Wajib Diisi!',
            'asal_instansi.required' => 'Asal instansi Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'no_hp.required' => 'No hp Wajib Diisi',
            'no_hp.numeric' => 'No hp Wajib Diisi',
            'tanggal.required' => ' Tanggal Wajib Diisi',
            'keperluan.required' => 'keperluan Wajib Diisi',
        ]);
        bukuTamu::where('no_buku_tamu', '=', $id)->update($data);
        return redirect('/table/bukutamu')->with('success', 'Data Berhasil Diedit');
    }


    public function destroy(string $id)
    {
        bukuTamu::where('no_buku_tamu', $id)->delete();
        return redirect('/table/bukutamu')->with('success', 'Data Berhasil Dihapus');
    }
}
