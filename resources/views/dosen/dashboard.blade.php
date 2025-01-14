
                <!-- Main Content -->
                <div class="pt-6">
                    <div class="container full-container py-5">

                        <!---Welcome back Card--->

                            <div class="lg:col-span-8 md:col-span-12 sm:col-span-12 col-span-12">
                                <div class="card bg-lightprimary dark:bg-darkprimary mb-0 overflow-hidden">
                                    <div class="card-body pb-10">
                                        <div class="grid grid-cols-12">
                                            <div class="lg:col-span-7 md:col-span-7 sm:col-span-12 col-span-12">
                                                <div class="flex gap-3 items-center mb-7">
                                                    <div class="rounded-full overflow-hidden">
                                                        <img src="../assets/images/profile/user-1.jpg"
                                                            class="h-10 w-10" alt="">
                                                    </div>
                                                    <h5 class="text-lg">
                                                        Welcome back {{ Auth::user()->name }}!</h5>
                                                </div>
                                                <div class="flex gap-6 items-center">
                                                    <div
                                                        class="pe-6 rtl:pe-auto rtl:ps-6  border-e border-[#adb0bb] border-opacity-20  dark:border-darkborder">
                                                        <h3
                                                            class="flex items-start mb-0 text-3xl">
                                                           {{ Auth::user()->dosen->nidn }}
                                                            <i
                                                                class="ti ti-arrow-up-right text-base  text-success "></i>
                                                        </h3>
                                                        <p class="text-sm mt-1">NIDN
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="lg:col-span-5 md:col-span-5 sm:col-span-12 col-span-12">
                                                <div class="sm:absolute relative right-0 rtl:right-auto rtl:left-0 -bottom-8">
                                                    <img src="{{ asset('assets/images/background/welcome-bg.svg') }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!---Welcome back Card End--->

  <!---Card With Circle Progressbar-->
  <div class="grid grid-cols-12 gap-6 mt-6">
    <div
        class="lg:col-span-3 md:col-span-6 sm:col-span-6 col-span-12">
        <div class="card ">
            <div class="card-body">
                <div
                    class="flex justify-between items-center">
                    <div>
                        <h4
                            class="font-light text-4xl text-dark dark:text-white">{{ $jumlahMahasiswa }}</h4>
                        <p class="mt-1">Total Mahasiswa
                            </p>
                    </div>
                    <!-- Circular Progress -->
                    <div class="relative size-20">
                        <svg class="size-full"
                            width="36" height="36"
                            viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Background Circle -->
                            <circle cx="18" cy="18"
                                r="16" fill="none"
                                class="stroke-current text-lightprimary dark:text-darkprimary"
                                stroke-width="2"></circle>
                            <!-- Progress Circle inside a group with rotation -->
                            <g
                                class="origin-center -rotate-90 transform">
                                <circle cx="18"
                                    cy="18" r="16"
                                    fill="none"
                                    class="stroke-current text-primary"
                                    stroke-width="2"
                                    stroke-dasharray="100"
                                    stroke-dashoffset="75"></circle>
                            </g>
                        </svg>
                        <!-- Percentage Text -->
                        <div
                            class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                            <span
                                class="text-center text-2xl text-primary">
                                <i
                                    class="ti ti-user-circle text-2xl"></i></span>
                        </div>
                    </div>
                    <!-- End Circular Progress -->

                </div>
            </div>
        </div>
    </div>
    <div
    class="lg:col-span-3 md:col-span-6 sm:col-span-6 col-span-12">
    <div class="card ">
        <div class="card-body">
            <div
                class="flex justify-between items-center">
                <div>
                    <h4
                        class="font-light text-4xl text-dark dark:text-white">{{ $jumlahKelas }}</h4>
                    <p class="mt-1">Total Kelas
                        </p>
                </div>
                <!-- Circular Progress -->
                <div class="relative size-20">
                    <svg class="size-full"
                        width="36" height="36"
                        viewBox="0 0 36 36"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Background Circle -->
                        <circle cx="18" cy="18"
                            r="16" fill="none"
                            class="stroke-current text-lighterror dark:text-darkerror"
                            stroke-width="2"></circle>
                        <!-- Progress Circle inside a group with rotation -->
                        <g
                            class="origin-center -rotate-90 transform">
                            <circle cx="18"
                                cy="18" r="16"
                                fill="none"
                                class="stroke-current text-error"
                                stroke-width="2"
                                stroke-dasharray="100"
                                stroke-dashoffset="75"></circle>
                        </g>
                    </svg>
                    <!-- Percentage Text -->
                    <div
                        class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <span
                            class="text-center text-2xl text-error">
                            <i
                                class="ti ti-home text-2xl"></i></span>
                    </div>
                </div>
                <!-- End Circular Progress -->

            </div>
        </div>
    </div>
</div>
<div
    class="lg:col-span-3 md:col-span-6 sm:col-span-6 col-span-12">
    <div class="card ">
        <div class="card-body">
            <div
                class="flex justify-between items-center">
                <div>
                    <h4
                        class="font-light text-4xl text-dark dark:text-white">{{ $jumlahMatakuliah }}</h4>
                    <p class="mt-1"> Total
                        Matakuliah</p>
                </div>
                <!-- Circular Progress -->
                <div class="relative size-20">
                    <svg class="size-full"
                        width="36" height="36"
                        viewBox="0 0 36 36"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Background Circle -->
                        <circle cx="18" cy="18"
                            r="16" fill="none"
                            class="stroke-current text-lightwarning dark:text-darkwarning"
                            stroke-width="2"></circle>
                        <!-- Progress Circle inside a group with rotation -->
                        <g
                            class="origin-center -rotate-90 transform">
                            <circle cx="18"
                                cy="18" r="16"
                                fill="none"
                                class="stroke-current text-warning"
                                stroke-width="2"
                                stroke-dasharray="100"
                                stroke-dashoffset="50"></circle>
                        </g>
                    </svg>
                    <!-- Percentage Text -->
                    <div
                        class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <span
                            class="text-center text-2xl text-warning">
                            <i
                                class="ti ti-books text-2xl"></i></span>
                    </div>
                </div>
                <!-- End Circular Progress -->

            </div>
        </div>
    </div>
</div>
<div
    class="lg:col-span-3 md:col-span-6 sm:col-span-6 col-span-12">
    <div class="card ">
        <div class="card-body">
            <div
                class="flex justify-between items-center">
                <div>
                    <h4
                        class="font-light text-4xl text-dark dark:text-white">{{ $jumlahKuisioner }}</h4>
                    <p class="mt-1">
                         Kuisioner Masuk</p>
                </div>
                <!-- Circular Progress -->
                <div class="relative size-20">
                    <svg class="size-full"
                        width="36" height="36"
                        viewBox="0 0 36 36"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Background Circle -->
                        <circle cx="18" cy="18"
                            r="16" fill="none"
                            class="stroke-current text-lightinfo dark:text-darkinfo"
                            stroke-width="2"></circle>
                        <!-- Progress Circle inside a group with rotation -->
                        <g
                            class="origin-center -rotate-90 transform">
                            <circle cx="18"
                                cy="18" r="16"
                                fill="none"
                                class="stroke-current text-info"
                                stroke-width="2"
                                stroke-dasharray="100"
                                stroke-dashoffset="20"></circle>
                        </g>
                    </svg>
                    <!-- Percentage Text -->
                    <div
                        class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <span
                            class="text-center text-2xl text-info">
                            <i
                                class="ti ti-receipt text-2xl"></i></span>
                    </div>
                </div>





                <!-- End Circular Progress -->

            </div>
        </div>
    </div>
</div>
</div>
<!---Card With Circle Progressbar End-->

<div class="my-4">
    <div class="card mb-6 mt-2">
<div class="card-body">

    <h5 class="card-title mt-2">Statistik Kinerja Dosen Berdasarkan Tahun Ajaran Terbaru Ke Lampau</h5>
    {{-- <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 mt-4">
        <div class="overflow-x-auto">
            <h3>Dosen: {{ $penilaianByTahunAjaran->first()['dosen']->nama_lengkap }}</h3>
            <h4>Nomor Induk Dosen Nasional: {{ $penilaianByTahunAjaran->first()['dosen']->nidn }}</h4>
            <h4>Program Studi: {{ $penilaianByTahunAjaran->first()['dosen']->prodi->nama_prodi }}</h4>
            <h4>Fakultas: {{ $penilaianByTahunAjaran->first()['dosen']->prodi->fakultas->nama_fakultas }}</h4>
        </div>
    </div> --}}

        <div id="chartsd"></div>


</div>
</div>
</div>


                        </div>
                    </div>
                <!-- Main Content End -->




                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script>
                    var ikdData = @json($penilaianByTahunAjaran->pluck('ikd'));
                    var classificationData = @json($penilaianByTahunAjaran->pluck('classification.badgeText'));
                    var tahunAjaranLabels = @json($penilaianByTahunAjaran->keys());

                    var colors = ikdData.map(function(ikd) {
                        if (ikd >= 4.00 && ikd <= 5.00) {
                            return '#00E396'; // Sangat Baik
                        } else if (ikd >= 3.00 && ikd < 4.00) {
                            return '#FEB019'; // Baik
                        } else if (ikd >= 2.00 && ikd < 3.00) {
                            return '#FF4560'; // Standar
                        } else if (ikd >= 1.00 && ikd < 2.00) {
                            return '#775DD0'; // Kurang
                        } else if (ikd >= 0.00 && ikd < 1.00) {
                            return '#FBC02D'; // Sangat Kurang
                        } else {
                            return '#E0E0E0'; // Belum Diisi
                        }
                    });

                    var options = {
                        series: [{
                            name: 'IKD',
                            data: ikdData
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                        },
                        annotations: {
                            yaxis: [{
                                y: 5.0,
                                borderColor: '#00E396',
                                label: {
                                    borderColor: '#00E396',
                                    style: {
                                        color: '#fff',
                                        background: '#00E396',
                                    },
                                    text: 'Sangat Baik',
                                }
                            }, {
                                y: 4.0,
                                borderColor: '#FEB019',
                                label: {
                                    borderColor: '#FEB019',
                                    style: {
                                        color: '#fff',
                                        background: '#FEB019',
                                    },
                                    text: 'Baik',
                                }
                            }, {
                                y: 3.0,
                                borderColor: '#FF4560',
                                label: {
                                    borderColor: '#FF4560',
                                    style: {
                                        color: '#fff',
                                        background: '#FF4560',
                                    },
                                    text: 'Standar',
                                }
                            }, {
                                y: 2.0,
                                borderColor: '#775DD0',
                                label: {
                                    borderColor: '#775DD0',
                                    style: {
                                        color: '#fff',
                                        background: '#775DD0',
                                    },
                                    text: 'Kurang',
                                }
                            }, {
                                y: 1.0,
                                borderColor: '#FBC02D',
                                label: {
                                    borderColor: '#FBC02D',
                                    style: {
                                        color: '#fff',
                                        background: '#FBC02D',
                                    },
                                    text: 'Sangat Kurang',
                                }
                            },
                             {
                                y: 0.0,
                                borderColor: '#000000',
                                label: {
                                    borderColor: '#000000',
                                    style: {
                                        color: '#fff',
                                        background: '#000000',
                                    },
                                    text: 'Belum Diisi',
                                }
                            }],
                        },
                        markers: {
                            size: 5,
                            colors: colors
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        grid: {
                            padding: {
                                right: 30,
                                left: 20
                            }
                        },
                        title: {
                            text: 'IKD dengan Klasifikasi',
                            align: 'left'
                        },
                        labels: tahunAjaranLabels,
                        xaxis: {
                            type: 'category',
                        },
                        colors: colors
                    };

                    var chart = new ApexCharts(document.querySelector("#chartsd"), options);
                    chart.render();
                </script>
