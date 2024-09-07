<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        if (strlen($katakunci)) {
            $data = Users::where('nama_admin', 'like', "%$katakunci%")
            ->orWhere('username', 'like', "%$katakunci%")
            ->paginate(4);
        }else{
            $data = Users::orderBy('id_user','asc')->paginate(4);
        }
       
        return view('dashboard.users.table')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_user', $request->id_user);
        Session::flash('nip', $request->id_user);
        Session::flash('nama_admin', $request->nama_admin);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);


       $data = $request->validate([
            'nip'=>'required',
            'nama_admin'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ], [
            'nip.required' => 'NIP Wajib di-isi!',
            'nama_admin.required' => 'Nama Wajib di-isi!',
            'username.required' => 'Username Wajib di-isi!',
            'email.required' => 'Email Wajib di-isi!',
            'password.required' => 'Password Wajib di-isi!',
        ]);

        $data = [
            'id_user'=>$request->id_user,
            'nip'=>$request->nip,
            'nama_admin'=>$request->nama_admin,
            'username'=>$request->username,
            'password'=>$request->password,
            'email'=>$request->email,
        ];

        $data['password'] = Hash::make($data['password']);

        Users::create($data);
        return redirect()->to('/table/users')->with('success', 'Data Berhasil Di-tambahkan.');
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
        $data = Users::where('id_user', $id)->first();
        return view('dashboard.users.edit')->with('data', $data);
    }

     
  public function update(Request $request, string $id)
  
  {$data = $request->validate([
    'nip'=>'required',
    'nama_admin'=>'required',
    'username'=>'required',
    'email'=>'required',
    'password'=>'required',
], [
    'nip.required' => 'NIP Wajib di-isi!',
    'nama_admin.required' => 'Nama Wajib di-isi!',
    'username.required' => 'Username Wajib di-isi!',
    'email.required' => 'Email Wajib di-isi!',
    'password.required' => 'Password Wajib di-isi!',
]);
    Users::where('id_user', $id)->update($data);
      return redirect('/table/users')->with('success', 'Data Berhasil Diedit');}

    
  public function destroy(string $id){Users::where('id_user', $id)->delete();
      return redirect('/table/users')->with('success', 'Data Berhasil Dihapus');}
}

