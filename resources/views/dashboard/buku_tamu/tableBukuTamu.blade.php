@extends('dashboard.layout.layout')
<title>Buku Tamu - PPDB</title>
<!-- START DATA -->
@section('content')
    <div class=" shadow-lg mt-16 w-[1227px] ml-1 h-screen">
        <div class="border-gray-600 border shadow-lg mt-16  ">
            <div class="bg-gray-500  py-3 rounded-t-lg">
                <span class="text-white text-2xl font-bold ml-10">Buku Tamu</span>
            </div>
            <div class="my-4 space-x-[55rem] flex justify-end  mr-20">
                <form class="d-flex mt-3" action="{{ url('/table/bukutamu/') }}" method="get" autocomplete="off">
                    <input class="border-gray-600 border shadow-xl px-4 rounded-lg mr-2" type="search" name="katakunci"
                        value="{{ Request::get('katakunci') }}" placeholder="Search data" aria-label="Search">
                    <button class="bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg" type="submit">Search</button>
                </form>
            </div>
            <div class=" ">
                <div class="ml-[1.1rem] ">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600  text-sm leading-normal ">
                                    <th class="py-3 px-6 text-left">No. Tamu</th>
                                    <th class="cpy-3 px-6 text-left">Nama Tamu</th>
                                    <th class="py-3 px-6 text-left">Asal Instansi</th>
                                    <th class="cpy-3 px-6 text-left">Alamat</th>
                                    <th class="py-3 px-6 text-left">No. Hp</th>
                                    <th class="py-3 px-6 text-left">Tanggal</th>
                                    <th class="cpy-3 px-6 text-left">Keperluan</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-semibold">
                                @foreach ($data as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->no_buku_tamu }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->nama_tamu}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->asal_instansi }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->alamat }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->no_hp }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->tanggal }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->keperluan }}</span>
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
    </div>




    {{-- <div class="flex justify-center">
        <div class="">
            <h2>Buku Tamu</h2>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                    <form class="d-flex" action="D" method="get">
                        <input class="form-control me-1" type="search" name="katakunci"
                            value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{ url('/table/bukutamu/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 text-left">No. Tamu</th>
                            <th class="cpy-3 px-6 text-left">Nama Tamu</th>
                            <th class="py-3 px-6 text-left">Asal Instansi</th>
                            <th class="cpy-3 px-6 text-left">Alamat</th>
                            <th class="py-3 px-6 text-left">No. Hp</th>
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="cpy-3 px-6 text-left">Keperluan</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                <td>{{ $item->nama_tamu }}</td>
                                <td>{{ $item->asal_instansi }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keperluan }}</td>
                                <td>
                                    <a href='{{ url('/table/bukutamu/' . $item->no_buku_tamu . '/edit/') }}'
                                        class="btn btn-warning btn-sm">Edit</a><br>
                                    <form action="{{ '/table/bukutamu/' . $item->no_buku_tamu }}" method="post"> @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div> --}}
    <!-- AKHIR DATA -->
@endsection
