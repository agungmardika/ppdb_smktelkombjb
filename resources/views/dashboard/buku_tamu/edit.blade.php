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
                                Edit Data Buku Tamu
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ url('/table/bukutamu/' . $data->no_buku_tamu) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="flex flex-wrap">


                                <div class="flex flex-wrap">

                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="no_buku_tamu"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                No. Buku Tamu
                                            </label>
                                            <input type="number"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name="no_buku_tamu" id="no_buku_tamu" value="{{ $data->no_buku_tamu }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="nama_tamu"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Nama Tamu
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='nama_tamu' id="nama_tamu" value=" {{ $data->nama_tamu }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="asal_instansi"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Asal Instansi
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='asal_instansi' id="asal_instansi" value=" {{ $data->asal_instansi }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="asal_instansi"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Alamat
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='alamat' id="alamat" value=" {{ $data->alamat }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="no_hp"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                No. Handphone
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='no_hp' id="no_hp" value=" {{ $data->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label for="tanggal"
                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Tanggal
                                            </label>
                                            <input type="date"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='tanggal' id="tanggal" value=" {{ $data->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                                Keperluan
                                            </label>
                                            <input type="text"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                name='keperluan' id="keperluan" value=" {{ $data->keperluan }}">
                                        </div>
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
