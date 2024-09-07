@extends('dashboard.layout.layout')
<!-- START DATA -->
@section('content')
    <div class=" shadow-lg mt-16 w-[1227px] ml-1 h-screen">
        <div class="bg-gray-500  py-3 rounded-t-lg">
            <span class="text-white text-2xl font-bold ml-10">Data User</span>
        </div>
        <div class=" ">
            <div class="mx-[1rem] mt-20 mb-5 pb-10">
                <div class="bg-white shadow-md rounded-t-lg my-6  overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 rounded-t-lg text-sm leading-normal">
                                <th class="py-3 px-6 ">ID User</th>
                                <th class="py-3 px-6 ">NIP</th>
                                <th class="py-3 px-6 ">Nama Admin</th>
                                <th class="py-3 px-6 ">Username</th>
                                <th class="py-3 px-6 ">Password</th>
                                <th class="py-3 px-6 ">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-semibold">
                            @foreach ($data as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        {{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                    <td class="py-3 px-6 text-left">{{ $item->nip }}</td>
                                    <td class="py-3 px-6 text-left">{{ $item->nama_admin }}</td>
                                    <td class="py-3 px-6 text-left">{{ $item->username }}</td>
                                    <td class="py-3 px-6 text-left">{{ $item->password }}</td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center space-x-2">
                                            <a href='{{ url('/table/users/' . $item->id_user . '/edit/') }}'
                                                class="bg-green-400 text-white text-center font-semibold px-2 py-2 rounded-lg">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
    {{-- <h2>Table User Admin</h2>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
              <form class="d-flex" action="{{ url('/table/users/' )}}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Cari</button>
              </form>
            </div>
            
            <!-- TOMBOL TAMBAH DATA -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">ID User</th>
                        <th class="col-md-1">NIP</th>
                        <th class="col-md-2">Nama Admin</th>
                        <th class="col-md-2">Username</th>
                        <th class="col-md-2">Password</th>
                        <th class="col-md-2">Created At</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama_admin }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->password}}</td>
                        <td>{{ $item->created_at}}</td>
                        <td>
                            <a href='{{ url('/table/users/' . $item->id_user . '/edit/' )}}' class="btn btn-warning btn-sm">Edit</a><br>
                            <form action="{{ '/table/users/' . $item->id_user }}" method="post"> @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    type="submit">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        {{ $data->links() }}
           
      </div> --}}
    <!-- AKHIR DATA -->
@endsection
