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
    <title>Beranda | PPDB SMK Telkom Banjarbaru</title>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
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


    <div class="box-border mt-5 h-16 w-56 p-4 bg-red-700">
        <div class="box-border mt-4 ml-7 h-16 w-60 bg-gray-700"></div>
    </div>
    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row">
            <div class="w-1/2 flex items-center">
                <div class="mt-16 ml-10">
                    <div class="flex justify-center pr-72">
                        <h2 class="font-bold text-2xl ">Pendidikan
                        </h2>
                        <hr class="w-full h-1 ml-3 my-4 bg-red-700 border-0 rounded">
                    </div>
                    <p class="text-lg md:w-[26rem] text-justify mt-10">
                        SMK Telkom Banjarbaru sejak Maret 2022 ditetapkan oleh Kemendikbudristek 2022 sebagai SMK
                        Program Keunggulan dibidang "Teknologi Informasi". Dan Terakreditasi A. <br>

                    </p>
                </div>
            </div>
            <div class="md:w-1/2 md:pl-4">
                <img src="{{ asset('storage/images/banner1.png') }}" alt="banner" class="w-full">
            </div>
        </div>
    </div>


    <div class="box-border h-[13rem] w-full p-4 bg-red-700 mt-10 md:mt-56">
        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-16 mt-4 md:mt-20">
            <div class="box-border md:ml-7 mb-4 md:mb-0 h-[10rem] md:w-[30rem] w-full bg-white border-gray-700 border-0 shadow-2xl rounded-lg text-gray-800 delay-[300ms] duration-[600ms] taos:translate-x-0 taos:opacity-100 md:taos:translate-x-[-200px] md:taos:opacity-0"
                data-taos-offset="100">
                <div class="flex justify-center m-4 md:m-9 font-semibold text-md md:text-xl text-justify">
                    <img src="{{ asset('storage/images/info.png') }}" class="h-8  md:h-10 w-10 mt-2 md:mt-5 mr-3"
                        alt="info">
                    <p class="text-xs md:text-base">Menggunakan materi pembelajaran yang relevan dengan industri</p>
                </div>
            </div>
            <div class="box-border md:ml-7 h-[10rem] md:w-[30rem] w-full bg-white border-gray-700 border-0 shadow-2xl rounded-lg delay-[300ms] duration-[600ms] taos:translate-x-0 taos:opacity-100 md:taos:translate-x-[200px] md:taos:opacity-0"
                data-taos-offset="100">
                <div class="flex justify-center m-4 md:m-9 font-semibold text-md md:text-xl">
                    <img src="{{ asset('storage/images/info.png') }}" class="h-8 md:h-10 w-10 mt-2 md:mt-5 mr-3"
                        alt="info">
                    <p class="text-xs md:text-base">Ujian berbasis blok yang menghasilkan produk & mengevaluasi
                        perkembangan siswa</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-56 w-full h-screen">
        <h3 class="text-4xl font-bold text-center mb-11 text-red-700">School Tour 360° <span
                class="text-sm">(Beta)</span>
        </h3>
        <iframe src="https://app.lapentor.com/sphere/smk-telkom-banjarbaru-1692727548" frameborder="0" width="100%"
            height="400px" scrolling="no" allow="vr,gyroscope,accelerometer" allowfullscreen="true"
            webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true"
            class="w-[90%] h-[35rem] mx-auto">
        </iframe>
    </div>
    <div class="mt-24">
        <div class="mx-auto mb-4">
            <p class=" text-2xl text-red-800 font-semibold text-center mx-auto">Album Kegiatan di SMK Telkom Banjarbaru</p>
        </div>
        <div class="box-border h-[11rem] w-full ">
            <div class="flex justify-center space-x-0 ">
                <div class="hover:bg-gray-700">
                    <div class="flex justify-center  font-semibold text-xl text-justify">
                        <img src="{{ asset('storage/images/1.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="flex justify-center font-semibold text-xl">
                        <img src="{{ asset('storage/images/2.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="flex justify-center font-semibold text-xl">
                        <img src="{{ asset('storage/images/3.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="flex justify-center font-semibold text-xl">
                        <img src="{{ asset('storage/images/4.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
                <div class=" ">
                    <div class="flex justify-center font-semibold text-xl">
                        <img src="{{ asset('storage/images/5.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
                <div class=" ">
                    <div class="flex justify-center font-semibold text-xl">
                        <img src="{{ asset('storage/images/6.jpg') }}" class="h-[11rem]" alt="info">
                        <p class="">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto p-4  my-24 ">
        <div class="flex content-end">
            <div class="box-border mt-5 h-16 w-56 p-4 bg-red-700">
                <div class="box-border mt-4 ml-7 h-16 w-60 bg-gray-700"></div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 md:pl-4">
                <img src="{{ asset('storage/images/banner2.png') }}" alt="banner" class="w-full">
            </div>
            <div class="md:w-1/2 ml-36">
                <div class="mt-24 ml-10">
                    <div class="flex justify-center pr-72">
                        <hr class="w-full h-1 mr-3 my-4 bg-red-700 border-0 rounded">
                        <h2 class="font-bold text-2xl ">Kurikulum
                        </h2>

                    </div>
                    <p class="text-lg md:w-[26rem] text-justify mt-10">
                        SMK Telkom Banjarbaru menerapkan sistem Kurikulum Merdeka. Siswa diasuh
                        oleh Tenaga Pengajar Profesional dan berprestasi serta memiliki fasilitas pembelajaran dan
                        praktikum yang lengkap.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->
    {{-- <div class = "group fixed bottom-0 right-0 p-2  flex items-end justify-end w-24 h-24 mr-24 mb-20">
        <div class = "text-white  flex items-center justify-center p-3 absolute w-20 h-20 rounded-full ">
            <a href="whatsapp://send?text=Halo admin, saya ingin mendaftar&phone=+628115005857">
                <img src="https://cdn2.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-whatsapp-circle-512.png"
                    alt="" class="absolute rounded-full "></a>
        </div>
    </div> --}}
    <div class="mx-20">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1150.3337858182797!2d114.83200180607902!3d-3.441364775513835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681d47b0ffd3b%3A0x3b48838a3c931f5b!2sTelkom%20Schools%20-%20SMK%20Telkom%20Banjarbaru!5e0!3m2!1sid!2sid!4v1701145127634!5m2!1sid!2sid"
            class="w-full h-[300px]  mr-24" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <footer class="bg-white ">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">

                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 mx-auto">
                    <div class="">
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
