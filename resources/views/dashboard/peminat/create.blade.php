@extends('dashboard.layout.layout')
<!-- START FORM -->
@section('content')
    <div class="border-gray-600 border shadow-lg  w-[85rem] ml-10">
        <section class=" py-1 bg-white">
            <div class="w-full lg:w-8/12 px-2 mx-auto ">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white-100 border-0 ">
                    <div class="rounded-t bg-white mb-0 px-6 py-4 ">
                        <div class="text-center mx-auto flex justify-between">
                            <h6 class=" text-xl font-bold">
                                Create Data Peminat
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ url('/table/peminat') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="no_reg"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            No. Registrasi
                                        </label>
                                        <input type="number"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="2425000" name="no_reg" id="no_reg">
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 "
                                            for="gelombang">
                                            Gelombang
                                        </label>
                                        <select
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name="gelombang" id="gelombang">
                                            <option value="">--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-12/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="nama"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Nama
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='nama' id="nama" value=" {{ Session::get('nama') }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="nisn"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                NISN
                                            </label>
                                            <input type="number"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='nisn' id="nisn" value=" {{ Session::get('nisn') }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="nik"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                NIK
                                            </label>
                                            <input type="number"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='nik' id="nik" value=" {{ Session::get('nik') }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="asal_sekolah"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Asal Sekolah
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='asal_sekolah' id="asal_sekolah"
                                                value=" {{ Session::get('asal_sekolah') }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="jenis_kelamin"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Jenis Kelamin
                                            </label>
                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="">--</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="agama"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Agama
                                            </label>
                                            <select name="agama" id="agama"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="">--</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Tempat Lahir
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='tempat_lahir' id="ttl" value=" {{ Session::get('ttl') }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Tanggal Lahir
                                            </label>
                                            <input type="date"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='tgl_lahir' id="ttl" value=" {{ Session::get('ttl') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="no_wa_siswa"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            No WA Siswa
                                        </label>
                                        <input type="number"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='no_wa_siswa' id="no_wa_siswa"
                                            value=" {{ Session::get('no_wa_siswa') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="jalur_masuk"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Jalur Masuk
                                        </label>
                                        <select name="jalur_masuk" id="jalur_masuk"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="">--</option>
                                            <option value="rapor">Rapor</option>
                                            <option value="akademis">Akademis</option>
                                            <option value="non-akademis">Non-Akademis</option>
                                            <option value="tahfidz">Tahfidz</option>
                                            <option value="minat_bakat">Minat Bakat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="jurusan_1"
                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Jurusan 1
                                        </label>
                                        <select name="jurusan_1" id="jurusan_1"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="">--</option>
                                            <option value="dkv">Desain Komunikasi Visual</option>
                                            <option value="rpl">Rekayasa Perangkat Lunak</option>
                                            <option value="animasi">Animasi</option>
                                            <option value="tkjt">TKJT</option>
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
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="">--</option>
                                            <option value="dkv">Desain Komunikasi Visual</option>
                                            <option value="rpl">Rekayasa Perangkat Lunak</option>
                                            <option value="animasi">Animasi</option>
                                            <option value="tkjt">TKJT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <button type="submit"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-green-500 text-white font-semibold text-xl rounded  shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
