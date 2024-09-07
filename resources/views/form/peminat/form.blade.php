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
    <title>Daftar | PPDB SMK Telkom Banjarbaru</title>
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
    <div class="bg-white top-0 p-6">
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

    <div class="">
        <div class="">
            <div class=" bg-white mx-56 my-10 pb-7 rounded-lg border-gray-400 border-2">
                <div class="text-center font-bold text-xl mb-3 bg-red-700 text-white py-4 w-full rounded-t-lg">
                    <h2>Pendaftaran Calon Peserta Didik Baru</h2>
                </div>
                <div class="flex content-center">
                    <form action="{{ url('/form/peminat') }}" method="POST" class="mx-auto mb-0 mt-8 space-y-9"
                        autocomplete="off">
                        @csrf
                        <div class="w-[60rem]">
                            <div class="relative group ">
                                <label for="no_regs" class="top-0 left-0 h-full flex items-center text-md ">
                                    Nomor Registrasi</label>
                                <input name="" type="text" id="no_regs" value="24250004" readonly
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <input type="hidden" id="displayReg" name="displayReg">
                            </div>
                        </div>
                        <div class="mx-auto">
                            <label class="">Gelombang</label>
                        </div>
                        <div class="w-[60rem] flex content-center space-x-10">
                            <div>
                                <input type="radio" id="1" name="gelombang" value="1" disabled />
                                <label for="1">1</label>
                            </div>

                            <div>
                                <input type="radio" id="2" name="gelombang" value="2" checked />
                                <label for="2">2</label>
                            </div>

                            <div>
                                <input type="radio" id="3" name="gelombang" value="3" disabled />
                                <label for="3">3</label>
                            </div>

                            <label for="" class="text-red-700">*Anda sedang memasuki gelombang 2</label>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="nama" type="text" id="nama" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="nama"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="nisn" type="number" id="nisn" required
                                   oninput="this.value = this.value.slice(0, 10); if (this.value.length === 10) this.setCustomValidity(''); else this.setCustomValidity('NISN tidak boleh lebih dari 10!');"
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5 ">
                                <label for="nisn"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    NISN (Nomor Induk Siswa Nasional)</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="nik" type="number" id="nik" required
                                    oninput="this.value = this.value.slice(0, 16); if (this.value.length === 16) this.setCustomValidity(''); else this.setCustomValidity('NIK tidak boleh lebih dari 16!');"
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="nik"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    NIK (Nomor Induk Kependudukan) Sesuai Kartu Keluarga</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="asal_sekolah" type="text" id="asal_sekolah" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="asal_sekolah"
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Asal Sekolah</label>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <label class="">Jenis Kelamin</label>
                        </div>
                        <div class="w-[60rem] flex content-center space-x-10">
                            <div>
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" />
                                <label for="laki-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" />
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <label for="tempat_lahir"
                                    class=" -valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Agama</label>
                                <select name="agama" id="agama"
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5"
                                    required>
                                    <option selected hidden>-Pilih Agama-</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>

                            </div>
                        </div>
                        
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <label for="tempat_lahir"
                                    class=" -valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" id="tempat_lahir" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">

                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <label for="date"
                                    class=" -valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Tanggal Lahir</label>
                                <input name="tgl_lahir" type="date" id="date" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">

                            </div>
                        </div>
                        <div class="w-[60rem] ">
                            <div class=" relative group ">
                                <input name="no_wa_siswa" type="number" id="no_wa" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for="no_wa"
                                    class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    No WA Siswa</label>
                            </div>
                        </div>

                        <div class="w-[60rem]">
                            <div class="mx-auto">
                                <label class="">Pilih Jalur Masuk Pendaftaran</label>
                            </div>
                            <div>
                                <input type="radio" id="rapor" name="jalur_masuk" value="Rapor" />
                                <label for="rapor">Jalur Rapor</label>
                            </div>

                            <div>
                                <input type="radio" id="prestasi" name="jalur_masuk" value="Prestasi Akademis" />
                                <label for="prestasi">Jalur Prestasi Akademis </label>
                            </div>

                            <div>
                                <input type="radio" id="non_akademis" name="jalur_masuk" value="Non Akademis" />
                                <label for="non_akademis">Jalur Prestasi Non Akademis </label>
                            </div>
                            <div>
                                <input type="radio" id="non_akademis" name="jalur_masuk" value="Tahfidz" />
                                <label for="non_akademis">Jalur Tahfidz </label>
                            </div>
                            <div>
                                <input type="radio" id="non_akademis" name="jalur_masuk" value="Minat Bakat" />
                                <label for="non_akademis">Jalur Tes Minat dan Bakat </label>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <label class="">Pemilihan Konsentrasi Keahlian (Pilihan 1 lebih di prioritaskan
                                daripada
                                pilihan 2)</label><br>
                            <label class="">Pilihan 1 :</label>
                            <div class="w-[60rem]  ">
                                <div>
                                    <input type="radio" id="tkjt1" name="jurusan_1" value="tkjt" />
                                    <label for="tkjt1">Teknik Komputer Jaringan Telekomunikasi (TKJT) </label>
                                </div>
                                <div>
                                    <input type="radio" id="rpl1" name="jurusan_1" value="rpl" />
                                    <label for="rpl1">Rekayasa Perangkat Lunak (RPL)
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="dkv1" name="jurusan_1" value="dkv" />
                                    <label for="dkv1">Desain Komunikasi Visual (DKV)</label>
                                </div>
                                <div>
                                    <input type="radio" id="animasi1" name="jurusan_1" value="animasi" />
                                    <label for="animasi1">Animasi</label>
                                </div>
                            </div>
                        </div>


                        <div class="w-[60rem] ">
                            <div class="mx-auto">
                                <label class="">Pilihan 2 :</label>
                            </div>
                            <div>
                                <input type="radio" id="tkjt" name="jurusan_2" value="tkjt" />
                                <label for="tkjt">Teknik Komputer Jaringan Telekomunikasi (TKJT) </label>
                            </div>
                            <div>
                                <input type="radio" id="rpl" name="jurusan_2" value="rpl" />
                                <label for="rpl">Rekayasa Perangkat Lunak (RPL)
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="dkv" name="jurusan_2" value="dkv" />
                                <label for="dkv">Desain Komunikasi Visual (DKV)</label>
                            </div>
                            <div>
                                <input type="radio" id="animasi" name="jurusan_2" value="animasi" />
                                <label for="animasi">Animasi</label>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="status" value="Peminat">
                        </div>
                        <button name="submit" type="submit"
                            class="w-full  text-white font-semibold  rounded-sm text-lg px-5 py-2.5 text-center ">Daftar</button>
                </div>
                </form>
            </div>
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
    <script>
        // JavaScript to submit the move-to-Pendaftar form
        document.getElementById('moveToPendaftarForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            fetch(this.action, {
                    method: this.method,
                    headers: {
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // You can handle the response here
                })
                .catch(error => console.error(error));
        });
    </script>
</body>

</html>
