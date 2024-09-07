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
    <title>Alur | PPDB SMK Telkom Banjarbaru</title>
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


    <!-- component -->
    <section>
        <div class="bg-red-800 text-white py-8">
            <div class="container mx-auto flex flex-col items-start md:flex-row my-12 md:my-24">
                <div class="flex flex-col w-full sticky md:top-36 lg:w-1/3 mt-2 md:mt-12 px-8">
                    <p class="text-3xl md:text-4xl leading-normal md:leading-relaxed mb-2 font-bold">Panduan Alur
                        pendaftaran</p>
                    <p class="text-sm md:text-base text-gray-50 mb-4">
                        Terdapat beberapa tahap pendaftaran yang harus dipenuhi agar semua rangkaian berjalan dengan
                        lancar
                    </p>
                </div>
                <div class="ml-0 md:ml-12 lg:w-2/3 sticky">
                    <div class="container mx-auto w-full h-full">
                        <div class="relative wrap overflow-hidden p-10 h-full">
                            <div class="border-2-2 border-white absolute h-full border"
                                style="right: 50%; border: 2px solid #fffff; border-radius: 1%;"></div>
                            <div class="border-2-2 border-white absolute h-full border"
                                style="left: 50%; border: 2px solid #fffff; border-radius: 1%;"></div>
                            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1 w-5/12 px-1 py-4 text-right">
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">Pendaftaran Calon Peserta Didik</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        - Isi Nama Lengkap <br>
                                        - Jenis Kelamin & Tempat Tanggal Lahir <br>
                                        - Nomor WhatsApp <br>
                                        - Pilih Jalur Masuk Pendaftaran <br>
                                        - Pilih Jurusan <br>
                                    </p>
                                </div>
                            </div>
                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1  w-5/12 px-1 py-4 text-left">
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">Identitas Orang Tua</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        - Isi Nama Ayah & Ibu <br>
                                        - Pekerjaan Ayah & Ibu <br>
                                        - Nomor WhatsApp Ayah & Ibu <br>
                                        - Alamat Ayah & Ibu <br>
                                    </p>
                                </div>
                            </div>
                            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1 w-5/12 px-1 py-4 text-right">
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">Melakukan Pembayaran</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        Lakukan Pembayaran melalui Virtual Account Bank Mandiri yang tertera pada
                                        halaman pendaftaran
                                    </p>
                                </div>
                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 w-5/12"></div>

                                <div class="order-1  w-5/12 px-1 py-4">
                                    <h4 class="mb-3 font-bold  text-lg md:text-2xl text-left">Konfirmasi Admin</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        Setelah melakukan pembayaran silahkan kirim bukti transfer ke admin PPDB. Selain
                                        bukti transfer syarat administrasi yang meliputi : <br>
                                        Pas foto terbaru <br>
                                        Akta kelahiran <br>
                                        kartu keluarga <br>
                                        Rapor kelas 7 & 8 (Semester 1 & 2) <br>
                                        bisa di kirim melalui WhatsApp Admin PPDB. <br>
                                        0811 500 5857 (Call Center) <br>
                                    </p>
                                </div>
                            </div>
                            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1 w-5/12 px-1 py-4 text-right">
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">Kwitansi Dari Admin</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        Selamat Anda Sudah terdaftar di SMK Telkom Banjarbaru

                                        Kwitansi pembayaran PPDB dapat kalian peroleh dari Admin PPDB setelah
                                        diverifikasi oleh Admin Keuangan. Kwitansi dapat diperoleh berupa file PDF.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('storage/images/hero-animation-01.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

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
