
{{-- <div class="container mx-auto p-4">
<table class="table-auto w-full">
    <thead class="px-6 py-4 bg-gray-100 text-gray-600 uppercase font-medium tracking-wider">
        <tr>
            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">No</th>
            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Kriteria Penilaian</th>
            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Rata-rata Jawaban Responden</th>
            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Nilai</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-border dark:divide-darkborder">
        @foreach($penilaianData as $index => $data)
            <tr class="search-items">
                <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $index + 1 }}</td>
                <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $data['kriteria'] }}</th>
                <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ number_format($data['average_score'], 2) }}</th>
                <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ number_format($data['total_score'], 2) }}</th>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Nilai Index Kinerja Dosen</td>
            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ number_format($totalIKD, 2) }}</th>
        </tr>
        <tr>
            <td colspan="3" class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Hasil Index Kinerja Dosen</td>
            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $classification }}</td>
        </tr>
    </tbody>
</table>
</div> --}}
{{-- @extends('layouts.mains')
@section('content')


<div class="container full-container py-5">
    <div
        class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
        <div class="card-body md:py-3 py-5">
            <div class="flex items-center grid grid-cols-12 gap-6">
                <div class="col-span-9">
                    <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Nilai Kuisioner Index Kinerja
                        Dosen
                    </h4>
                    <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                        <li class="flex items-center">
                            <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                href="{{ url('dashboard') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="p-0.5 rounded-full bg-dark dark:bg-darklink mx-2.5 flex items-center">
                            </div>
                        </li>
                        <li class="flex items-center text-sm text-link dark:text-darklink leading-none"
                            aria-current="page">
                           Nilai IKD
                        </li>
                    </ol>
                </div>
                <div class="col-span-3 -mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}"
                            class="md:-mb-7 -mb-4 h-full w-full" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----Breadcrumb Start---->



<div class="my-4 ">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100 text-gray-600 uppercase font-medium">
                        <tr>
                            <th class="py-3 px-4 text-left" width="20px">No</th>
                            <th class="py-3 px-4 text-left" width="350px">Kriteria Penilaian</th>
                            <th class="py-3 px-4 text-left" width="100px">Rata-rata</th>
                            <th class="py-3 px-4 text-left" width="100px">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($penilaianData as $index => $data)
                            <tr class="text-gray-700">
                                <td class="py-2 px-4">{{ $index + 1 }}</td>
                                <td class="py-2 px-4">{{ $data['kriteria'] }}</td>
                                <td class="py-2 px-4">{{ number_format($data['average_score'], 2) }}</td>
                                <td class="py-2 px-4">{{ number_format($data['total_score'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-gray-100 text-gray-600">
                            <td colspan="3" class="py-2 px-4">Nilai IKD</td>
                            <td class="py-2 px-4">{{ number_format($totalIKD, 2) }}</td>
                        </tr>

                        <tr class="{{ $classification === 'Sangat Baik' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            <td colspan="3" class="py-2 px-4">Hasil Index Kinerja Dosen:  <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ $classification['badgeClass'] }}">
                                {{ $classification['badgeText'] }}
                            </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection --}}


@extends('layouts.mains')
@section('content')

<div class="container full-container py-5">
    <div class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
        <div class="card-body md:py-3 py-5">
            <div class="flex items-center grid grid-cols-12 gap-6">
                <div class="col-span-9">
                    <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Nilai Kuisioner Index Kinerja Dosen</h4>
                    <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                        <li class="flex items-center">
                            <a class="opacity-80 text-sm text-link dark:text-darklink leading-none" href="{{ url('dashboard') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="p-0.5 rounded-full bg-dark dark:bg-darklink mx-2.5 flex items-center"></div>
                        </li>
                        <li class="flex items-center text-sm text-link dark:text-darklink leading-none" aria-current="page">
                            Nilai IKD
                        </li>
                    </ol>
                </div>
                <div class="col-span-3 -mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}" class="md:-mb-7 -mb-4 h-full w-full" />
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        <div class="max-w-3xl mx-auto">
            @foreach($penilaianByTahunAjaran as $tahunAjaran => $data)
            <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 mt-5">
                <div class="overflow-x-auto">
                        <h5 class="font-semibold text-lg mb-3">Tahun Ajaran: {{ $tahunAjaran }}</h5>
                        <table class="min-w-full bg-white border border-gray-200 mb-4">
                            <thead class="bg-gray-100 text-gray-600 uppercase font-medium">
                                <tr>
                                    <th class="py-3 px-4 text-left">Kriteria Penilaian</th>
                                    <th class="py-3 px-4 text-left">Rata-rata</th>
                                    <th class="py-3 px-4 text-left">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($data['criteria_scores'] as $criterion => $scores)
                                    <tr class="text-gray-700">
                                        <td class="py-2 px-4">{{ $criterion }}</td>
                                        <td class="py-2 px-4">{{ $scores['average_response'] }}</td>
                                        <td class="py-2 px-4">{{ $scores['score'] }}</td>
                                    </tr>
                                    {{-- @foreach($scores['subcriteria_scores'] as $subcriterion => $subScores)
                                        <tr class="text-gray-500">
                                            <td class="py-2 px-4 pl-8">{{ $subcriterion }}</td>
                                            <td class="py-2 px-4">{{ $subScores['average_score'] }}</td>
                                            <td class="py-2 px-4">{{ $subScores['respondents_count'] }}</td>
                                        </tr>
                                    @endforeach --}}
                                @endforeach
                                <tr class="bg-gray-100 text-gray-600">
                                    <td colspan="2" class="py-2 px-4 font-semibold">Nilai IKD</td>
                                    <td class="py-2 px-4">{{ $data['ikd'] }}</td>
                                </tr>
                                <tr class="{{ $data['classification']['badgeClass'] }}">
                                    <td colspan="2" class="py-2 px-4">Hasil Index Kinerja Dosen</td>
                                    <td class="py-2 px-4">{{ $data['classification']['badgeText'] }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>




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


@endsection
