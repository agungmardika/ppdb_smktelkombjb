<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PPDB | Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil elemen input tersembunyi
            var hiddenInput = document.getElementById('reg');
            var displayInput = document.getElementById('displayReg');
            var form = document.querySelector('form');
    
            // Set the initial value from the hidden input or default to 24250000
            var currentIncrement = parseInt(hiddenInput.value, 10) || 24250001;
    
            // Set the initial display value
            displayInput.value = currentIncrement;
    
            // Handle input event for readonly field
            displayInput.addEventListener('input', function () {
                var inputValue = parseInt(displayInput.value, 10) || 0;
                hiddenInput.value = inputValue;
            });
    
            // Tambahkan event listener pada form submit
            form.addEventListener('submit', function (event) {
                // Increment nilai setiap kali form disubmit
                currentIncrement++;
                hiddenInput.value = currentIncrement;
                displayInput.value = currentIncrement; // Set the display input value
    
                // Uncomment the next line if you want to see the values before submitting
                console.log(hiddenInput.value, displayInput.value);
    
                // Form will submit normally after this
            });
        });
    </script>
    
</head>

<body>
    <div class="">
        <div class="">
            <div class=" bg-white mx-56 m-20 p-16 rounded-xl border-gray-400 border-2">
                <div class="text-center font-bold text-2xl mb-3 bg-red-700 text-white py-4 w-[70rem]">
                    <h2>Pendaftaran Calon Peserta Didik Baru</h2>
                </div>
                <div class="flex content-center">
                    <form action="{{ url('/form/peminat')}}" method="POST" class="mx-auto mb-0 mt-8 space-y-9" autocomplete="off">
                        @csrf
                        <div class="w-[70rem] flex flex-col">
                            <div class="relative group">
                                <label for="reg" class="-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Nomor Registrasi
                                </label>
                                <input name="no_reg" type="number" id="reg" required readonly class="">
                                <input type="text" id="displayReg" name="no_reg" readonly
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md border border-gray-300 text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600 p-2.5 mt-2">
                            </div>
                        </div>
                        
                        <div class="mx-auto">
                            <label class="">Gelombang</label>
                        </div>
                        <div class="w-[70rem] flex content-center space-x-10">
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
                            <label for="" class="text-red-700">*Anda sedang Memasuki Gelombang 2</label>
                        </div>
                        
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <input name="nama" type="text" id="" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for=""
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <input name="nisn" type="number" id="" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for=""
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    NISN (Nomor Induk Siswa Nasional)</label>
                            </div>
                        </div>
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <input name="nik" type="number" id="" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for=""
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    NIK (Nomor Induk Kependudukan) Sesuai Kartu Keluarga</label>
                            </div>
                        </div>
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <input name="asal_sekolah" type="text" id="" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for=""
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Asal Sekolah</label>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <label class="">Jenis Kelamin</label>
                        </div>
                        <div class="w-[70rem] flex content-center space-x-10">
                            <div>
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" />
                                <label for="laki-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" />
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <label class="">Agama</label>
                        </div>
                        <div class="w-[70rem] flex content-center space-x-10">

                            <div>
                                <input type="radio" id="Islam" name="agama" value="islam" />
                                <label for="Islam">Islam</label>
                            </div>
                            <div>
                                <input type="radio" id="Kristen" name="agama" value="kristen" />
                                <label for="Kristen">Kristen</label>
                            </div>
                            <div>
                                <input type="radio" id="Katolik" name="agama" value="katolik" />
                                <label for="Katolik">Katolik</label>
                            </div>
                            <div>
                                <input type="radio" id="Buddha" name="agama" value="buddha" />
                                <label for="Buddha">Buddha</label>
                            </div>
                            <div>
                                <input type="radio" id="Hindu" name="agama" value="hindu" />
                                <label for="Hindu">Hindu</label>
                            </div>
                            <div>
                                <input type="radio" id="Konghucu" name="agama" value="konghucu" />
                                <label for="Kristen">Konghucu</label>
                            </div>
                        </div>
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <label for="date"
                                    class=" -valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    Tanggal Lahir</label>
                                <input name="ttl" type="date" id="date" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">

                            </div>
                        </div>
                        <div class="w-[70rem] ">
                            <div class=" relative group ">
                                <input name="no_wa_siswa" type="text" id="" required
                                    class="rounded-lg w-full bg-gray-50 outline-none text-md peer border border-gray-300  text-gray-900 sm:text-md focus:ring-primary-600 focus:border-primary-600  p-2.5">
                                <label for=""
                                    class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-md group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">
                                    No WA Siswa</label>
                            </div>
                        </div>

                        <div class="w-[70rem]">
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
                            <label class="">Pemilihan Konsentrasi Keahlian (Pilihan 1 lebih di prioritaskan daripada
                                pilihan 2)</label><br>
                            <label class="">Pilihan 1 :</label>
                            <div class="w-[70rem]  ">
                                <div>
                                    <input type="radio" id="tkjt1" name="tkjt" value="tkjt" />
                                    <label for="tkjt1">Teknik Jaringan Komputer dan Telekomunikasi  (TKJ) </label>
                                </div>
                                <div>
                                    <input type="radio" id="rpl1" name="rpl" value="rpl" />
                                    <label for="rpl1">Rekayasa Perangkat Lunak (RPL)
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="dkv1" name="dkv" value="dkv" />
                                    <label for="dkv1">Desain Komunikasi Visual (DKV)</label>
                                </div>
                                <div>
                                    <input type="radio" id="animasi1" name="animasi" value="animasi" />
                                    <label for="animasi1">Animasi</label>
                                </div>
                            </div>
                        </div>


                        <div class="w-[70rem] ">
                            <div class="mx-auto">
                                <label class="">Pilihan 2 :</label>
                            </div>
                            <div>
                                <input type="radio" id="tkjt" name="tkjt" value="tkjt" />
                                <label for="tkjt">Teknik Jaringan Komputer dan Telekomunikasi (TKJT) </label>
                            </div>


                            <div>
                                <input type="radio" id="rpl" name="rpl" value="rpl" />
                                <label for="rpl">Rekayasa Perangkat Lunak (RPL)
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="dkv" name="dkv" value="dkv" />
                                <label for="dkv">Desain Komunikasi Visual (DKV)</label>
                            </div>
                            <div>
                                <input type="radio" id="animasi" name="animasi" value="animasi" />
                                <label for="animasi">Animasi</label>
                            </div>
                        </div>


                        <button name="submit" type="submit"
                            class="w-full bg-black text-white font-semibold  rounded-sm text-lg px-5 py-2.5 text-center ">Daftar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</body>


</html>