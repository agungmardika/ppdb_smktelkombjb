<!DOCTYPE html>
<html lang="en">

<head>

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
        <title>Berhasil Mendaftar | PPDB SMK Telkom Banjarbaru</title>
        <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
            integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
            crossorigin="anonymous" />
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
    <div class="bg-white sticky top-0 p-6">
        <div class="flex justify-center md:justify-between items-center">
            <a href="<?php echo url('/index'); ?>">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-40 h-12 md:mr-6" alt="logo"></a>
            <div
                class="font-bold text-gray-600 text-sm md:text-md space-x-4 md:space-x-10 flex justify-end items-center">
                <a class="hover:text-red-600" href="<?php echo url('/index'); ?>">Beranda</a>
                <a class="hover:text-red-600" href="<?php echo url('/alur'); ?>">Alur Pendaftaran</a>
                <a class="hover:text-red-600" href="<?php echo url('/brosur'); ?>">Lihat Brosur</a>
                <a class=" bg-red-700 text-white font-semibold px-4 md:px-9 rounded-lg py-3"
                    href="{{ url('/form/peminat') }}">Daftar Sekarang</a>
                <a class=" bg-red-700 text-white font-semibold px-4 md:px-9 rounded-lg py-3"
                    href="{{ url('/form/bukutamu') }}">Buku Tamu</a>
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
    <div class="mx-auto mt-10">
        <h3 class="font-bold text-blue-950 text-2xl text-center">Selamat Anda Berhasil Melakukan Registrasi</h3>
        <div class=" mt-3  text-md font-semibold ">
            <div class=" mx-80 ">
                <div class="mx-auto">
                    <div class="container p-2 mx-auto sm:p-4 text-gray-800  rounded-lg">
                        <div class="flex justify-center">
                            <table class="w-full border-2">
                                <colgroup class="border-2">
                                    <col class="w-5 border-2">
                                    <col class="w-5 border-2">
                                </colgroup>
                                <tbody class="border-b bg-gray-50 mx-72 border-2">
                                    <tr>
                                        <td class="px-5 py-2 border">
                                            No Registrasi
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->no_reg }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Gelombang</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->gelombang }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Nama Lengkap</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->nama }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>NISN</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->nisn }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>NIK</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->nik }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Asal Sekolah</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->asal_sekolah }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Jenis Kelamin</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->jenis_kelamin }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Agama</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->agama }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>TTL</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>No WA Siswa</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->no_wa_siswa }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Jalur Masuk</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->jalur_masuk }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Pilihan Jurusan 1</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->jurusan_1 }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-5 py-2 border">
                                            <p>Pilihan Jurusan 2</p>
                                        </td>
                                        <td class="px-5 py-2 border">
                                            <span>{{ $data->jurusan_2 }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class=" lg:w-12/12 px-4">
                    <div class="relative  mb-3">
                        <!-- Removed the button -->
                    </div>
                    <p class="text-center text-gray-500 my-16">
                        <a href="{{ url('/index') }}" class="text-blue-500">Kembali ke Halaman Beranda?</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <footer class="bg-white ">
        <div class="mx-auto  max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0 mt-16">
                    <a href="                                                                                       "
                        class="flex items-center">
                        <img src="{{ asset('storage/images/logo.png') }}" class="h-12 mr-3" alt="Telkom Logo" />
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
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
