@extends('dashboard.layout.layout')
       <!-- START FORM -->
       @section('content')

       <h2>Create</h2>
       <form action='{{ url('/table/users') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nip' id="nip" value=" {{ Session::get('nip') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_admin' id="nama_admin" value=" {{ Session::get('nama_admin') }}">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' id="username" value=" {{ Session::get('username') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email" value=" {{ Session::get('email') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='password' id="password" value=" {{ Session::get('password') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Save</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
       @endsection
