<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Belleza&family=Josefin+Sans&family=Montserrat&family=Poppins:wght@400;500;600&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
    <title>Index</title>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat'],
                    },
                },
            },
        };
    </script>
</head>

<body class="font-montserrat">
    <div class="bg-white p-6">
        <div class="flex justify-center md:justify-between items-center">
            <a href="<?php echo url('/index'); ?>">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-40 h-12 md:mr-6" alt=""></a>
            <div
                class="font-bold text-gray-600 text-sm md:text-md space-x-4 md:space-x-10 flex justify-end items-center">
                <a class="hover:text-red-600" href="<?php echo url('/index'); ?>">Beranda</a>
                <a class="hover:text-red-600" href="<?php echo url('/alur'); ?>">Alur Pendaftaran</a>
                <a class="hover:text-red-600" href="<?php echo url('/brosur'); ?>">Lihat Brosur</a>
                
                <a class=" bg-red-700 text-white font-semibold px-4 md:px-9 rounded-lg py-3"
                    href="{{ url('/form/peminat') }}">Daftar Sekarang</a>
                <a class=" bg-red-700 text-white font-semibold px-4 md:px-9 rounded-lg py-3"
                    href="{{ url('') }}">Buku Tamu</a>
                            </div>
        </div>
    </div>

    @if (Session::has('login'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Login Berhasil!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (Session::has('logout'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Logout Berhasil!',
                text: 'See you next time.',
            })
        </script>
    @endif

    @if (Session::has('form_berhasil'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Formulir berhasil di-simpan, Terima kasih.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="">
        <div class="">
            <div class=" bg-white mx-56 my-10 pb-7 rounded-lg border-gray-400 border-2">
                <div class="text-center font-bold text-xl mb-3 bg-red-700 text-white py-4 w-full rounded-t-lg">
                    <h2>Pengisian Daftar Tamu</h2>
                </div>
                <div class="flex content-center">
                    <form action="{{ url('/form/bukutamu') }}" method="POST" class="mx-auto mb-0 mt-8 space-y-9"
                        autocomplete="off">
                        @csrf
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="nama_tamu" type="text" id="nama_tamu" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="nama_tamu"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Nama Tamu</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="asal_instansi" type="text" id="asal_instansi" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="asal_instansi"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Asal Instansi</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="alamat" type="text" id="alamat" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="alamat"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Alamat</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="no_hp" type="number" id="no_hp" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="no_hp"
                                    class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    No Handphone</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group "><label for=""
                                    class="  text-sm group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-full peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Tanggal Berkunjung</label>
                                <input name="tanggal" type="date" id="" required
                                    value=" {{ Session::get('tanggal') }}"
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">

                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="keperluan" type="text" id="keperluan" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="keperluan"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-sm peer-valid:text-sm group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Keperluan</label>
                            </div>
                        </div>
                        <button name="submit" type="submit"
                            class="w-full bg-black text-white font-semibold  rounded-sm text-lg px-5 py-2.5 text-center ">Daftar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="border-gray-600 border shadow-lg  w-[85rem] ml-10">
        <section class=" py-1 bg-white">
            <div class="w-full lg:w-8/12 px-2 mx-auto ">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white-100 border-0 ">
                    <div class="rounded-t bg-white mb-0 px-6 py-4 ">
                        <div class="text-center mx-auto flex justify-between">
                            <h6 class=" text-xl font-bold">
                                Create Data Buku Tamu
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ url('/form/bukutamu') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="nama_tamu"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            Nama Tamu
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='nama_tamu' id="nama_tamu" value=" {{ Session::get('nama_tamu') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="asal_instansi"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            Asal Instansi
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='asal_instansi' id="asal_instansi"
                                            value=" {{ Session::get('asal_instansi') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="alamat"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            Alamat
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='alamat' id="alamat" value=" {{ Session::get('alamat') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="no_hp"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            No. Handphone
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='no_hp' id="no_hp" value=" {{ Session::get('no_hp') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="tanggal"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            Tanggal
                                        </label>
                                        <input type="date"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='tanggal' id="tanggal" value=" {{ Session::get('tanggal') }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label for="keperluan"
                                            class="block uppercase text-blueGray-600 text-sm font-bold mb-2">
                                            Keperluan
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name='keperluan' id="keperluan"
                                            value=" {{ Session::get('keperluan') }}">
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
    </div> --}}
    <footer class="bg-white ">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">

                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 mx-auto">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Menu Utama</h2>
                        <ul class="text-gray-500 ">
                            <li class="mb-4">
                                <a href="                                                                                       "
                                    class="hover:text-red-700">Beranda</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Sambutan</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Profil Sekolah</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Pusat Bantuan</a>

                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Program Studi
                        </h2>
                        <ul class="text-gray-500 ">

                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Teknik Jaringan
                                    Akses
                                    Telekomunikasi</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Teknik Komputer &
                                    Jaringan</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Rekayasa Perangkat
                                    Lunak</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700">Desain Komunikasi
                                    Visual</a>
                            </li>
                            <li class="mb-4">
                                <a href="" class="hover:text-red-700 ">Animasi</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase  ml-6">Kontak Kami
                        </h2>
                        <ul class="text-gray-500 ">
                            <li class="mb-4">
                                <a href="#" class="hover:text-red-700">Contact Person: 0811 500 5857
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-red-700">Contact Person: 0851 0165 6160</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">© 2023 <a
                        href="                                                                                     "
                        class="hover:text-red-700">SMK Telkom Banjarbaru</a>. All Rights
                    Reserved.
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
