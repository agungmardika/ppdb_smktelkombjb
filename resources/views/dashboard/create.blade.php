@extends('dashboard.layout.layout')
       <!-- START FORM -->
       @section('content')

       <h2>Create</h2>
       <form action='{{ url('/table/bukutamu') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama_tamu" class="col-sm-2 col-form-label">Nama Tamu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_tamu' id="nama_tamu" value=" {{ Session::get('nama_tamu') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="asal_instansi" class="col-sm-2 col-form-label">Asal Instansi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='asal_instansi' id="asal_instansi" value=" {{ Session::get('asal_instansi') }}">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat" value=" {{ Session::get('alamat') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_hp' id="no_hp" value=" {{ Session::get('no_hp') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal' id="tanggal" value=" {{ Session::get('tanggal') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='keperluan' id="keperluan" value=" {{ Session::get('keperluan') }}">
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
