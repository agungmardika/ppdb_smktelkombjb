<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fontawesome/fontawesome-free/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <script>
        var dt = new Date();
        document.getElementById('date-time').innerHTML = dt;
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
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
<div class="bg-white shadow-lg ">

    <div class="flex items-start ml-16  py-3 font-montserrat">
        <a href="{{ url('/index') }}">
            <img src="{{ asset('storage/images/logo.png') }}" class="w-40 h-12 mr-44" alt=""></a>
    </div>
</div>
<div class="flex justify-center font-montserrat font-bold">
    <div class="sticky left-0">
        <aside class="sticky left-0 w-72 h-full" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-900">
                <ul class="space-y-2 font-semibold">
                    <li>
                        <a href="#" class="flex items-center p-2 text-white">
                            <div class="rounded-full bg-slate-400 w-10 h-10"></div>
                            <p class="ml-3 text-xl capitalize">@if (Auth::check()) {{ Auth::user()->username }} @endif</p>
                            <br>
                        </a>
                    </li>
                    <hr class="h-px
        my-8 bg-white border-0">
    <li>
        <a href="{{ url('/table/dashboard') }}"
            class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-cyan-500 ">
            <i class="fa-solid fa-house w-5 h-5"></i>
            <span class="ml-3">Dashboard</span>
        </a>
    </li>
    <li>
        <button type="button"
            class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-cyan-500"
            aria-controls="dataAdminDropdown" data-collapse-toggle="">
            <i class="fa-solid fa-user"></i>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Admin</span>
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <ul id="dataAdminDropdown" class="py-2 space-y-2 ml-5">
            <li>
                <a href="/table/users"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-cyan-500">Data
                    User</a>
            </li>
        </ul>
    </li>
    <li>
        <button type="button"
            class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-cyan-500"
            aria-controls="pendaftaranDropdown" data-collapse-toggle="">
            <i class="fa-solid fa-credit-card"></i>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Pendaftaran</span>
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <ul id="pendaftaranDropdown" class="py-2 space-y-2 ml-5">
            <li>
                <a href="{{ url('/table/peminat') }}"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-cyan-500">Lihat
                    Data Peminat</a>
            </li>
            <li>
                <a href="{{ url('/table/pendaftar') }}"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-cyan-500">Lihat
                    Data Pendaftar</a>
            </li>
            <li>
                <a href="{{ url('/table/daftarulang') }}"
                    class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-cyan-500">Lihat
                    Data Daftar Ulang</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ url('/table/bukutamu') }}"
            class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-cyan-500">
            <i class="fa-solid fa-book"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Buku Tamu</span>
        </a>
    </li>
    <hr class="h-px mt-4 bg-white border-0">
    <li class="ml-16  ">
        <a href="{{ url('/logout') }}" class="flex items-center w-max p-2 text-white rounded-lg bg-red-700 mt-10 ">
            <svg class="flex-shrink-0 w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 18 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
        </a>
    </li>
    </ul>
    </div>
    </aside>
    </div>


    <div id="loading" class="loading-overlay">
        <div class="spinner">
            <div class="">
                @include('dashboard.komponen.pesan')

                @yield('content')
                @yield('script')
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>

    </body>

</html>
