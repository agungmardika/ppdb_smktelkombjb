@extends('dashboard.layout.layout')
<!-- START FORM -->
@section('content')
    <div class="w-[1231px] h-screen">
        <h2 class="capitalize">Edit Profile {{ $data->username }}</h3>
            <form action='{{ url('/table/users/' . $data->id_user) }}' method='post' autocomplete="off">
                @csrf
                @method('put')
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nip' id="nip"
                                value=" {{ $data->nip }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_admin' id="nama_admin"
                                value=" {{ $data->nama_admin }}" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='username' id="username"
                                value=" {{ $data->username }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='email' id="email"
                                value=" {{ $data->email }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='password' id="password" readonly
                                value=" {{ $data->password }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary text-black" name="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
    <!-- AKHIR FORM -->
@endsection
