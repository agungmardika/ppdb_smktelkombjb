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
    <title>Brosur | PPDB SMK Telkom Banjarbaru</title>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon"
        href="https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools-bundar-1024x1024.png"
        type="image/x-icon">
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
                <img src="{{ asset('storage/images/logo.png') }}" class="w-40 h-12 md:mr-6" alt=""></a>
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

    <div class="grid grid-cols-3 row-auto gap-y-20">
        <div class="col-start-2">
            <img src="{{ asset('storage/images/brosur1.png') }}" alt="brosur" class="h-screen">
        </div>
        <div class="col-start-2">
            <img src="{{ asset('storage/images/Brosur 2.jpg') }}" alt="brosur" class="h-screen">
        </div>
        <div class="col-start-2">
            <img src="{{ asset('storage/images/Brosur 3.jpg') }}" alt="brosur" class="h-screen">
        </div>
        <div class="col-start-2">
            <img src="{{ asset('storage/images/Brosur 4.jpg') }}" alt="brosur" class="h-screen">
        </div>
    </div>



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
                                <a href="#" class="hover:text-red-700">Contact Person: 0851 0165
                                    6160</a>
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
