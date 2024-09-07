<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login - PPDB</title>
</head>

<body>


    {{-- <div class="static">
        <img src="{{ asset('storage/images/foto gedung.jpg') }}" alt="background" class="opacity-50	">
    </div>  --}}
    <div class="flex h-screen w-full items-center justify-center bg-cover  "
        style="background-image:url('https://www.smktelkom-bjb.sch.id/web/assets/img/23042022044915FotoProfilUpdate.jpg');">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full ">
                <div class="flex justify-center static">
                    <div class="absolute">
                        <img src="{{ asset('storage/images/pattern-kiri.png') }}" alt="pattern kiri"
                            class="ml-32 w-32 h-40">
                    </div>
                    
                </div>

                @if (Session::has('logingagal'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal!',
                            text: 'Mohon dicoba lagi.',
                            footer: '<a href="{{ url('/index') }}">Balik ke Homepage?</a>'
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




                <!--logo kiri-->
                <img src="{{ asset('storage/images/npc2.png') }}" alt="img kiri"
                    class="object-contain w-80 h-80 ml-24 mt-20">

                <!--logo kanan-->
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">

                    <div class="text-center mb-10 mt-20">
                        <!--logo skatel-->
                        <img src="{{ asset('storage/images/logo.png') }}" alt="logo skatel" class="w-52 mx-auto">
                    </div>
                    <div>
                        <form action="/login" method="POST" autocomplete="off">
                            @csrf
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Username</label>
                                    <div class="flex">
                                        <div class="w-10 pl-1 text-center flex items-center justify-center">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <input type="text" name="username"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-12">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="password" name="password"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500"
                                            autocomplete="current-password">
                                    </div>

                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button type="submit" name="submit"
                                        class=" w-full  pl-10 pr-3 py-2 rounded-lg border-2 mx-auto bg-red-700 text-white font-bold outline-none hover:bg-red-800 focus:bg-red-500">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
