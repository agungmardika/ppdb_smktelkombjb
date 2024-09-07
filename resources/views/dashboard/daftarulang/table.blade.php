@extends('dashboard.layout.layout')
<!-- START DATA -->
@section('content')
    <div class=" shadow-lg mt-16 w-[1227px] ml-1 h-screen">
        <div class="bg-gray-500  py-3 rounded-t-lg">
            <span class="text-white text-2xl font-bold ml-10">Data Daftar Ulang</span>
        </div>
        <div class="my-4 space-x-[40rem] flex justify-end  mr-20">
            <form class="d-flex mt-3" action="{{ url('/table/pendaftar/') }}" method="get" autocomplete="off">
                <input class="border-gray-600 border shadow-xl px-4 rounded-lg mr-2" type="search" name="katakunci"
                    value="{{ Request::get('katakunci') }}" placeholder="Search data" aria-label="Search">
                <button class="bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg" type="submit">Search</button>
            </form>
        </div>
        <div class=" ">
            <div class="mx-[1rem] mb-5 pb-10">
                <div class="bg-white shadow-md rounded my-6 ">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600  text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID Pendaftar</th>
                                <th class="py-3 px-6 text-left">No. Reg</th>
                                <th class="py-3 px-6 text-left">Gelombang</th>
                                <th class="py-3 px-6 text-left">Nama</th>
                                <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                                <th class="py-3 px-6 text-left">TTL</th>
                                <th class="py-3 px-6 text-center">Dokumen</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-semibold ">
                            @foreach ($data as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ $item->id_pendaftar }}</span>
                                        </div>
                                    </td>
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
                                            <span>{{ $item->jenis_kelamin }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center space-x-1">
                                            <button type="button" class="bg-blue-500 text-white font-semibold px-3 py-2 rounded-lg mt-3"
                                                data-toggle="modal" data-target="#dokumen_aktamodal_{{ $item->id_pendaftar }}">
                                                Akta
                                            </button>
                                            <button type="button" class="bg-blue-500 text-white font-semibold px-3 py-2 rounded-lg mt-3"
                                                data-toggle="modal" data-target="#dokumen_ktp_ortumodal_{{ $item->id_pendaftar }}">
                                                KTP Ortu
                                            </button>
                                        </div>
                                        <div class="flex justify-center space-x-1">
                                            <button type="button" class="bg-blue-500 text-white font-semibold px-3 py-2 rounded-lg mt-3"
                                                data-toggle="modal" data-target="#dokumen_kkmodal_{{ $item->id_pendaftar }}">
                                                KK
                                            </button>
                                            <button type="button" class="bg-blue-500 text-white font-semibold px-3 py-2 rounded-lg mt-3"
                                                data-toggle="modal" data-target="#dokumen_rapormodal_{{ $item->id_pendaftar }}">
                                                Rapor
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ $item->status }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center space-x-2">
                                            <a href='{{ url('/table/pendaftar/' . $item->id_pendaftar . '/edit/') }}'
                                                class="bg-green-400 text-white text-center font-semibold px-2 py-2
                                        rounded-lg">Edit</a>
                                            <form action="{{ '/table/pendaftar/' . $item->id_pendaftar }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 text-white font-semibold px-1 py-2 rounded-lg"
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
                                    </td>
                                    <div class="modal fade" id="{{ $item->no_reg }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg text-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail
                                                        {{ $item->nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span class="text-6xl" aria-hidden="true">&times;</span>
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
            </tr>
            @endforeach
            </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    </div>
    </div>

    @foreach ($data as $item)
    <!-- Modal for Dokumen Akta -->
    <div class="modal fade" id="dokumen_aktamodal_{{ $item->id_pendaftar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dokumen Akta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/dokumen_akta/' . $item->dokumen_akta) }}" alt="Dokumen Akta">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Dokumen KTP Ortu -->
    <div class="modal fade" id="dokumen_ktp_ortumodal_{{ $item->id_pendaftar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dokumen KTP Ortu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/dokumen_ktp_ortu/' . $item->dokumen_ktp_ortu) }}" alt="Dokumen KTP Ortu">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Dokumen KK -->
    <div class="modal fade" id="dokumen_kkmodal_{{ $item->id_pendaftar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dokumen KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/dokumen_kk/' . $item->dokumen_kk) }}" alt="Dokumen KK">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Dokumen Rapor -->
    <div class="modal fade" id="dokumen_rapormodal_{{ $item->id_pendaftar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dokumen Rapor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/dokumen_rapor/' . $item->dokumen_rapor) }}" alt="Dokumen Rapor">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endforeach


    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Perubahan disimpan ke Data.',
                text: '{{ session('success') }}',
            });
        @endif
    </script>
    <!-- AKHIR DATA -->
@endsection
