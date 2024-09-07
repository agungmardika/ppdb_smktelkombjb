@extends('dashboard.layout.layout')
<!-- START DATA -->
@section('content')
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
@section('content')

    @php
        $totalCount = $peminatCount + $pendaftarCount;
    @endphp

    <div class="w-[1231px] font-montserrat">
        <div class="flex justify-center bg-slate-400 text-white h-20 relative">
            <div class="mr-auto pl-6 flex items-center">
                @if (Auth::check())
                    <p class="text-2xl font-semibold capitalize ">Halo, {{ Auth::user()->username }}</p>
                @endif
            </div>

            <div class="relative">
                <img src="{{ asset('storage/images/jajar-genjang.png') }}" alt="parallelogam" class="w-96 h-full">
                <div class="display-date absolute top-5 left-20 text-white text-center p-2">
                    <div class="">
                        <span id="day">day</span>,
                        <span id="daynum">00</span>
                        <span id="month">month</span>
                        <span id="year">0000</span>
                        <span class="display-time"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-2 m-10 rounded-lg pb-10">
            <div class="flex justify-center mt-4 space-x-10 ">
                <div class="py-4 px-20 border rounded-xl shadow-md hover:shadow-xl">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-notes-medical text-4xl flex items-center"></i>
                        <span class="text-2xl ml-4 flex items-center">{{ $peminatCount }}</span>
                    </div>
                    <div class="">
                        <p class="text-xl text-gray-400">Peminat</p>
                    </div>
                </div>
                <div class="py-4 px-20 border rounded-xl shadow-md hover:shadow-xl">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-address-card text-4xl flex items-center"></i>
                        <span class="text-2xl ml-4 flex items-center">{{ $pendaftarCount }}</span>
                    </div>
                    <div class="">
                        <p class="text-xl text-gray-400">Pendaftar</p>
                    </div>
                </div>
                <div class="py-4 px-20 border rounded-xl shadow-md hover:shadow-xl">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-book-open text-4xl flex items-center"></i>
                        <span class="text-2xl ml-4 flex items-center">{{ $bukuTamuCount }}</span>
                    </div>
                    <div class="">
                        <p class="text-xl text-gray-400">Buku Tamu</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center space-x-2 mt-6 px-3">
                <div class="">
                    <div class="">
                        <div class="py-4 px-20 mr-20 border rounded-xl shadow-md hover:shadow-xl">
                            <div class="">
                                <div class="flex justify-center">
                                    <i class="fa-solid fa-clock-rotate-left text-4xl"></i>
                                    <span class="text-xl ml-4 flex items-center">Siswa yang terakhir mendaftar :</span>
                                </div>
                                <div class="ml-12">
                                    <p class="text-xl text-gray-400  ">{{ $latestRecord->nama }}
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <div class=" text-gray-500 rounded  py-5 px-5 " x-data="{ cardOpen: false, cardData: cardData() }"
                                    x-init="$watch('cardOpen', value => value ? (cardData.countUp($refs.total, 0, 11602, null, 0.8), cardData.sessions.forEach((el, i) => cardData.countUp($refs[`device${i}`], 0, cardData.sessions[i].size, null, 1.6))) : null);
                                    setTimeout(() => { cardOpen = true }, 100)">
                                    <div class="flex w-full">
                                        <div class="">
                                            <h3 class="text-lg font-semibold leading-tight flex-1">Kuota Penerimaan
                                                Siswa :</h3>
                                        </div>

                                        <div class="relative h-5 leading-none">
                                            <button class="text-xl text-gray-500 hover:text-gray-300 h-6 focus:outline-none"
                                                @click.prevent="cardOpen=!cardOpen">
                                                <i class="mdi" :class="'mdi-chevron-' + (cardOpen ? 'up' : 'down')"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="">
                                        <h3 class="text-lg font-semibold leading-tight flex-1">{{ $pendaftarCount }} / 300
                                        </h3>
                                    </div>
                                    <div class="relative overflow-hidden transition-all duration-500" x-ref="card"
                                        x-bind:style="`max-height:${cardOpen?$refs.card.scrollHeight:0}px; opacity:${cardOpen?1:0}`">
                                        <div>
                                            <div class="pb-4 lg:pb-6 mt-3">
                                                <div class="overflow-hidden rounded-full h-3 bg-gray-800 flex transition-all duration-500"
                                                    :class="cardOpen ? 'w-full' : 'w-0'">
                                                    <template x-for="(item,index) in cardData.sessions">
                                                        <div class="h-full" :class="`bg-${item.color}`"
                                                            :style="`width:${item.size}%`">
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                            <div class="flex -mx-4">
                                                <template x-for="(item,index) in cardData.sessions">
                                                    <div class="w-1/3 px-4" :class="{ '': index !== 0 }">
                                                        <div class="text-sm">
                                                            <span
                                                                class="inline-block w-2 h-2 rounded-full mr-1 align-middle"
                                                                :class="`bg-${item.color}`">&nbsp;</span>
                                                            <span class="align-middle" x-text="item.label">&nbsp;</span>
                                                        </div>
                                                        <div class="font-medium text-lg text-white">
                                                            <span :x-ref="`device${index}`">0</span>%
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-2 ml-10 border  px-4 rounded-xl shadow-md hover:shadow-xl">
                    <div class="h-72">
                        <p class="text-xl text-center">Perbandingan Data Peminat dan Pendaftar</p>
                        <canvas class="mx-auto" id="myChart"></canvas>
                    </div>
                </div>

            </div>

        </div>
    </div>







@endsection
@section('script')
    <script>
        const displayTime = document.querySelector(".display-time");
        // Time
        function showTime() {
            let time = new Date();
            displayTime.innerText = time.toLocaleTimeString("en-US", {
                hour12: false
            });
            setTimeout(showTime, 1000);
        }

        showTime();

        // Date
        function updateDate() {
            let today = new Date();

            // return number
            let dayName = today.getDay(),
                dayNum = today.getDate(),
                month = today.getMonth(),
                year = today.getFullYear();

            const months = [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ];
            const dayWeek = [
                "Minggu",
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jumat",
                "Sabtu",
            ];
            // value -> ID of the html element
            const IDCollection = ["day", "daynum", "month", "year"];
            // return value array with number as a index
            const val = [dayWeek[dayName], dayNum, months[month], year];
            for (let i = 0; i < IDCollection.length; i++) {
                document.getElementById(IDCollection[i]).firstChild.nodeValue = val[i];
            }
        }

        updateDate();

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Peminat", "Pendaftar"],
                datasets: [{
                    backgroundColor: [


                        "#55565b",
                        "#b6252a"
                    ],
                    data: [{{ $peminatCount }}, {{ $pendaftarCount }}]
                }]
            }
        });


        let cardData = function() {
            return {
                countUp: function(target, startVal, endVal, decimals, duration) {
                    const countUp = new CountUp(target, startVal || 0, endVal, decimals || 0, duration || 2);
                    countUp.start();
                },
                sessions: [{
                    "label": "Peminat",
                    "size": {{ $peminatCount }},
                    "color": "indigo-600"
                }, ]
            }
        }
    </script>
@endsection
