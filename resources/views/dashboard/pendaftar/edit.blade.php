@extends('dashboard.layout.layout')
<!-- START FORM -->
@section('content')
    <div class="-lg mt-16 w-[76.7rem] ml-1">
        <section class=" py-1 bg-white">
            <div class="w-full lg:w-8/12 px-2 mx-auto ">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 -lg rounded-lg bg-white-100 border-2 ">
                    <div class="rounded-t bg-white mb-0 px-6 py-4 ">
                        <div class="text-center mx-auto flex justify-between">
                            <h6 class=" text-xl font-bold">
                                Edit Data Pendaftar ({{ $data->nama }})
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ url('/table/pendaftar/' . $data->id_pendaftar) }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')


                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 "
                                            for="gelombang">
                                            Gelombang
                                        </label>
                                        <select
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name="gelombang" id="gelombang">
                                            <option selected="none" hidden value="{{ $data->gelombang }}">
                                                {{ $data->gelombang }}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full lg:w-8/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="nama"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Nama Lengkap
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='nama' id="nama" value=" {{ $data->nama }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="nisn"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            NISN
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='nisn' id="nisn" value=" {{ $data->nisn }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="nik"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            NIK
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='nik' id="nik" value=" {{ $data->nik }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="asal_sekolah"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Asal Sekolah
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='asal_sekolah' id="asal_sekolah" value=" {{ $data->asal_sekolah }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="jenis_kelamin"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Jenis Kelamin
                                        </label>
                                        <input type="radio" name="jenis_kelamin" id="jkl" value="Laki-laki"
                                        {{ $data->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                                        <label for="jkl">Laki-laki</label>
                                        <input type="radio" name="jenis_kelamin" id="jkp" value="Perempuan"
                                        {{ $data->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                                        <label for="jpk">Perempuan</label>
                                        {{-- <select name="jenis_kelamin" id="jenis_kelamin"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option selected="none" hidden value="{{ $data->jenis_kelamin }}">
                                                {{ $data->jenis_kelamin }}</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="agama"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Agama
                                        </label>
                                        <select name="agama" id="agama"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option selected="none" hidden value="{{ $data->agama }}">
                                                {{ $data->agama }}</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Tempat Lahir
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='tempat_lahir' id="tempat_lahir" value=" {{ $data->tempat_lahir }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Tanggal Lahir
                                        </label>
                                        <input type="text"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='tgl_lahir' id="tgl_lahir" value=" {{ $data->tgl_lahir }}">
                                    </div>
                                </div>
                            </div>


                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="no_wa_siswa"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        No WA Siswa
                                    </label>
                                    <input type="text"
                                        class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        name='no_wa_siswa' id="no_wa_siswa" value=" {{ $data->no_wa_siswa }}">
                                </div>
                            </div>
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="jalur_masuk"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Jalur Masuk
                                    </label>
                                    <select name="jalur_masuk" id="jalur_masuk"
                                        class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option selected="none" hidden value="{{ $data->jalur_masuk }}">
                                            {{ $data->jalur_masuk }}</option>
                                        <option value="Rapor">Rapor</option>
                                        <option value="Prestasi Akademis">Prestasi Akademis</option>
                                        <option value="Non Akademis">Non-Akademis</option>
                                        <option value="Tahfidz">Tahfidz</option>
                                        <option value="Minat Bakat">Minat Bakat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="jurusan_1"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Jurusan 1
                                        </label>
                                        <select name="jurusan_1" id="jurusan_1"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option selected="none" hidden value="{{ $data->jurusan_1 }}">
                                                {{ $data->jurusan_1 }}</option>
                                            <option value="DKV">Desain Komunikasi Visual</option>
                                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                                            <option value="Animasi">Animasi</option>
                                            <option value="TKJT">TKJT</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="jurusan_2"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Jurusan 2
                                        </label>
                                        <select name="jurusan_2" id="jurusan_2"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option selected="none" hidden value="{{ $data->jurusan_2 }}">
                                                {{ $data->jurusan_2 }}</option>
                                            <option value="DKV">Desain Komunikasi Visual</option>
                                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                                            <option value="Animasi">Animasi</option>
                                            <option value="TKJT">TKJT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Dokumen Akta
                                        </label>
                                        @if ($data->dokumen_akta)
                                        <p>Filename: {{ $data->dokumen_akta }}</p>
                                           @endif
                                        <input type="file"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='dokumen_akta' id="dokumen_akta">
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Dokumen KTP Orang Tua
                                        </label>
                                        @if ($data->dokumen_ktp_ortu)
                                        <p>Filename: {{ $data->dokumen_ktp_ortu }}</p>
                                           @endif
                                        <input type="file"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='dokumen_ktp_ortu' id="dokumen_ktp_ortu">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Dokumen Kartu Keluarga
                                        </label>
                                        @if ($data->dokumen_kk)
                                        <p>Filename: {{ $data->dokumen_kk }}</p>
                                           @endif
                                        <input type="file"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='dokumen_kk' id="dokumen_kk">
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Dokumen Rapor
                                        </label>
                                        @if ($data->dokumen_rapor)
                                        <p>Filename: {{ $data->dokumen_rapor }}</p>
                                           @endif
                                        <input type="file"
                                            class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='dokumen_rapor' id="dokumen_rapor">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="status"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Status
                                    </label>
                                    <select name="status" id="status"
                                        class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option hidden value="{{ $data->status }}">
                                            {{ $data->status }}</option>
                                        <option value="Peminat">Peminat</option>
                                        <option value="Pendaftar">Pendaftar</option>
                                        <option value="Daftar Ulang">Daftar Ulang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <button type="submit"
                                        class="border-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-green-500 text-white font-semibold text-xl rounded   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        name="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>
    <script>
        // Add a script block to handle SweetAlert notifications
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Ada data yang belum terisi!',
                text: '{{ session('error') }}',
            });
        @endif
    </script>
@endsection
