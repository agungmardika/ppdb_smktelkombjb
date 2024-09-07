<body class="h-full">


    @extends('dashboard.layout.layout')
    <!-- START DATA -->
    @section('content')
        <div class=" shadow-lg mt-16 w-[1226.5px] ml-1 h-screen">
            <div class="bg-gray-500  py-3 rounded-t-lg">
                <span class="text-white text-2xl font-bold ml-10">Data Peminat</span>
            </div>
            <div class="my-4 space-x-[40rem] flex justify-end  mr-20">
                <form class="d-flex mt-3" action="{{ url('/table/peminat/') }}" method="get" autocomplete="off">
                    <input class="border-gray-600 border shadow-xl px-4 rounded-lg mr-2" type="search" name="katakunci"
                        value="{{ Request::get('katakunci') }}" placeholder="Search data" aria-label="Search">
                    <button class="bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg" type="submit">Search</button>
                </form>
            </div>
            <div class=" ">
                <div class="mx-[1rem] mb-5 pb-10">
                    <div class="bg-white shadow-md rounded my-6  ">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600  text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">No Reg</th>
                                    <th class="py-3 px-6 text-left">Gelombang</th>
                                    <th class="py-3 px-6 text-left">Nama</th>
                                    <th class="py-3 px-6 text-left">Asal Sekolah</th>
                                    <th class="py-3 px-6 text-left">TTL</th>
                                    <th class="py-3 px-6 text-left">Jalur Masuk</th>
                                    <th class="py-3 px-6 text-left">Jurusan 1</th>
                                    <th class="py-3 px-6 text-left">Jurusan 2</th>
                                    <th class="py-3 px-6 text-left">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-semibold ">
                                @foreach ($data as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100 bg-white">

                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->no_reg }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->gelombang }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->asal_sekolah }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->jalur_masuk }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->jurusan_1 }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->jurusan_2 }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $item->status }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center space-x-3">
                                                <a href='{{ url('/table/peminat/' . $item->no_reg . '/edit/') }}'
                                                    class="bg-green-400 text-white text-center font-semibold px-3 py-2 rounded-lg">Edit</a>
                                                <form action="{{ '/table/peminat/' . $item->no_reg }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="bg-red-500 text-white font-semibold px-[0.80rem] py-2 rounded-lg"
                                                        type="submit">Delete</button>
                                                </form>
                                            </div>
                                            <div class="flex justify-center">
                                                <div class="mt-3">
                                                    <button type="button"
                                                        class="bg-blue-500 text-white font-semibold px-3 py-2 rounded-lg mt-3"
                                                        data-toggle="modal" data-target="#{{ $item->no_reg }}">
                                                        Detail
                                                    </button>
                                                    <div class="modal fade" id="{{ $item->no_reg }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg text-md" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                        {{ $item->nama }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span class="text-6xl"
                                                                            aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="space-y-5 text-md">
                                                                        <!-- Isi konten modal di sini -->
                                                                        <div class="">
                                                                            <span> No Reg : {{ $item->no_reg }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Gelombang :
                                                                                {{ $item->gelombang }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Nama : {{ $item->nama }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> NISN : {{ $item->nisn }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> NIK : {{ $item->nik }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Asal Sekolah :
                                                                                {{ $item->asal_sekolah }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Jenis Kelamin :
                                                                                {{ $item->jenis_kelamin }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Agama : {{ $item->agama }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> TTL : {{ $item->tempat_lahir }},
                                                                                {{ $item->tgl_lahir }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> No WA Siswa :
                                                                                {{ $item->no_wa_siswa }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Jalur Masuk :
                                                                                {{ $item->jalur_masuk }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Jurusan 1 :
                                                                                {{ $item->jurusan_1 }}</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span> Jurusan 2 :
                                                                                {{ $item->jurusan_2 }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Perubahan disimpan ke Data.',
                    text: '{{ session('success') }}',
                });
            @endif
        </script>
    @endsection
</body>
