
	<!-- Main Content -->
    <div class=" max-w-full pt-6">
        <div class="container full-container py-5">
            <div class="grid grid-cols-12 gap-6">
                <!---Top Cards--->
                <div class="col-span-12">
                    <div class="owl-carousel counter-carousel owl-theme ">
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightprimary dark:bg-darkprimary w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-user-check text-xl flex-shrink-0"></i>
                                            {{-- <img src="" width="50"
                                                height="50" class="mb-3" alt> --}}
                                        </div>
                                        <p class="font-semibold  text-primary mb-1">
                                            Data Admin
                                        </p>
                                        <h5 class="text-lg font-semibold text-primary mb-0">{{ $admin }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightwarning dark:bg-darkwarning w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-users-group text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-warning mb-1">
                                            Data Dosen
                                        </p>
                                        <h5 class="text-lg font-semibold text-warning mb-0">{{ $dosens }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightinfo dark:bg-darkinfo w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-school text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-info mb-1">
                                            Data Fakultas
                                        </p>
                                        <h5 class="text-lg font-semibold text-info mb-0">{{ $fakultass }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lighterror dark:bg-darkerror w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-tag text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-error mb-1">
                                            Data Prodi
                                        </p>
                                        <h5 class="text-lg font-semibold text-error mb-0">{{ $prodis }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightsuccess dark:bg-darksuccess w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-books text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-success mb-1">
                                            Matakuliah
                                        </p>
                                        <h5 class="text-lg font-semibold text-success mb-0">{{ $matkul }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightprimary dark:bg-darkprimary w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-users-plus text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-primary mb-1">
                                             Mahasiswa
                                        </p>
                                        <h5 class="text-lg font-semibold text-primary mb-0">{{ $mahasiswa }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightwarning dark:bg-darkwarning w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-users-group text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-warning mb-1">
                                            Data Kelas
                                        </p>
                                        <h5 class="text-lg font-semibold text-warning mb-0">{{ $kelas }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card mb-0 shadow-none bg-lightsuccess dark:bg-darksuccess w-full">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="flex justify-center">
                                            <i class="ti ti-layout-dashboard text-xl flex-shrink-0"></i>
                                        </div>
                                        <p class="font-semibold  text-success mb-1">
                                            Data KRS
                                        </p>
                                        <h5 class="text-lg font-semibold text-success mb-0">{{ $KRS }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!---Top Cards End--->





            </div>

        </div>
    </div>
    <!-- Main Content End -->





<div class="container">


    <div class="grid grid-cols-12 gap-6 mt-6">
        <div
            class="lg:col-span-3 md:col-span-6 sm:col-span-6 col-span-12">
            <div class="card ">
                <div class="card-body">
                    <div
                        class="flex justify-between items-center">
                        <div>
                            <h4
                                class="font-light text-4xl text-dark dark:text-white">{{ $skala }}</h4>
                            <p class="mt-1">
                               Skala Penilaian </p>
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
                                        class="ti ti-chart-dots text-2xl"></i></span>
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
                                class="font-light text-4xl text-dark dark:text-white">{{ $kriteria }}</h4>
                            <p class="mt-1">Kriteria Penilaian
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
                                        class="ti ti-list-letters text-2xl"></i></span>
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
                                class="font-light text-4xl text-dark dark:text-white">{{ $subKriteria }}</h4>
                            <p class="mt-1"> Sub Kriteria
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
                                        stroke-dashoffset="50    "></circle>
                                </g>
                            </svg>
                            <!-- Percentage Text -->
                            <div
                                class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                <span
                                    class="text-center text-2xl text-warning">
                                    <i
                                        class="ti ti-list-check text-2xl"></i></span>
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
                                class="font-light text-4xl text-dark dark:text-white">{{ $penilaian }}</h4>
                            <p class="mt-1">
                                Hasil Penilaian</p>
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
                                        stroke-dashoffset="45"></circle>
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



</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="container">
<div class="card mt-5">
    <div class="card-title p-4">

        <h1>Rata-rata Nilai IKD per Fakultas</h1>
    </div>
<div class="card-body">

    <div id="chartf"></div>
</div>
</div>
</div>
<script>
    var options = {
        series: [
            @foreach ($series as $data)
            {
                name: "{{ $data['name'] }}",
                data: [
                    @foreach ($data['data'] as $ikd)
                    {
                        x: "{{ $ikd['x'] }}",
                        y: {{ $ikd['y'] }}
                    },
                    @endforeach
                ]
            },
            @endforeach
        ],
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
            }, {
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
            size: 5
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'IKD Per Fakultas',
            align: 'left'
        },
        xaxis: {
            type: 'category',
        },
    };

    var chart = new ApexCharts(document.querySelector("#chartf"), options);
    chart.render();
</script>
