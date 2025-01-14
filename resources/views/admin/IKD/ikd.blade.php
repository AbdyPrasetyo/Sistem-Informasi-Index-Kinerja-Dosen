@extends('layouts.mains')
@section('content')
<!----Breadcrumb Start---->
<div class="pt-5">
    <div class="container full-container py-5">
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Data Index Kinerja Dosen
                            Janabadra</h4>
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
                                Data IKD Dosen
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




        <!---Contact Card--->

        <div class="card mb-6 ">
            <div class="card-body">


                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">

                                <div class="grid grid-cols-4 md:gap-6 gap-y-12 mt-2 ">



                                    <form class="relative max-w-64">
                                        <input type="text" class="form-control product-search pl-11 py-2"
                                            id="input-search" placeholder="Search dosen..." />
                                        <i
                                            class="ti ti-search absolute  start-3  text-bodytext dark:text-darklink text-xl translate-y-1/2 -top-2"></i>
                                    </form>
                                    <form id="items-per-page-form" class="relative max-w-64"
                                        action="{{ url()->current() }}" method="GET"
                                        class="hs-dropdown   relative inline-flex [--placement:top-left]">
                                        <select name="items_per_page" id="items-per-page"
                                            class="min-h-[32px] py-1 px-2 inline-flex items-center gap-x-1 text-sm rounded-md border border-gray-200 text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                            onchange="this.form.submit()">
                                            <option value="5" {{ $itemsPerPage == 5 ? 'selected' : '' }}>5 per page
                                            </option>
                                            <option value="10" {{ $itemsPerPage == 10 ? 'selected' : '' }}>10 per
                                                page</option>
                                            <option value="20" {{ $itemsPerPage == 20 ? 'selected' : '' }}>20 per
                                                page</option>
                                            <option value="50" {{ $itemsPerPage == 50 ? 'selected' : '' }}>50 per
                                                page</option>
                                            <option value="100" {{ $itemsPerPage == 100 ? 'selected' : '' }}>100 per
                                                page</option>
                                        </select>
                                    </form>

                                    <div class="relative max-w-64">
                                            <a href="{{ url('ikd') }}"
                                                class="btn-md text-sm gap-1 items-center font-medium rounded-md border border-transparent bg-success text-white hover:bg-successemphasis dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                Refresh <i class="ti ti-refresh text-sm"></i>
                                            </a>



                                    </div>
                                </div>




                                <form method="GET" action="{{ route('ikd.index') }}">
                                    <div class="grid grid-cols-4 md:gap-6 gap-y-12 mt-2 mb-3">
                                        <!-- Tahun Ajaran -->
                                        <div class="md:col-span-1">
                                            <label for="tahun_ajaran" class="form-label block">Pilih Tahun
                                                Ajaran:</label>
                                            <select class="form-select py-2.5 px-4 block w-full" id="tahun_ajaran"
                                                name="tahun_ajaran">
                                                @foreach($tahunAjaranList as $tahun)
                                                <option value="{{ $tahun }}"
                                                    {{ old('tahun_ajaran', request('tahun_ajaran')) == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Fakultas -->
                                        <div class="md:col-span-1 ">
                                            <label for="fakultas_id" class="form-label block">Pilih
                                                Fakultas:</label>
                                            <select class="form-select py-2.5 px-4 block w-full" id="fakultas_id"
                                                name="fakultas_id">
                                                <option value="">Pilih Fakultas</option>
                                                @foreach($fakultasList as $fakultas)
                                                <option value="{{ $fakultas->fakultas_id }}"
                                                    {{ old('fakultas_id', request('fakultas_id')) == $fakultas->fakultas_id ? 'selected' : '' }}>
                                                    {{ $fakultas->nama_fakultas }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Prodi -->
                                        <div class="md:col-span-1">
                                            <label for="prodi_id" class="form-label block">Pilih Prodi:</label>
                                            <select class="form-select py-2.5 px-4 block w-full" id="prodi_id"
                                                name="prodi_id">
                                                <option value="">Pilih Prodi</option>
                                                @foreach($prodiList as $prodi)
                                                <option value="{{ $prodi->prodi_id }}"
                                                    {{ old('prodi_id', request('prodi_id')) == $prodi->prodi_id ? 'selected' : '' }}>
                                                    {{ $prodi->nama_prodi }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="md:col-span-1 mt-5">
                                            <button type="submit"
                                                class="btn-md text-sm flex gap-1 items-center font-medium rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                Filter <i class="ti ti-filter text-sm"></i>
                                            </button>

                                        </div>


                                    </div>
                                </form>







                                {{-- <div class="lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12 "> --}}

                                {{-- </div> --}}
                                {{-- <div class="grid grid-cols-12 gap-6">
                                </div> --}}
                                <table
                                    class="table search-table min-w-full divide-y divide-border dark:divide-darkborder ">
                                    <thead>
                                        <tr>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                Action</th>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-left">
                                                Dosen</th>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-left">
                                                Prodi</th>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-left">
                                                Fakultas</th>
                                            {{-- @foreach($criteria as $criterion)
                                                <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $criterion->nama_kriteria }}
                                            </th>
                                            @endforeach --}}
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                Tahun Ajaran</th>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                Nilai IKD</th>
                                            <th
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-left">
                                                Hasil IKD</th>

                                        </tr>
                                    </thead>



                                    <tbody class="divide-y divide-border dark:divide-darkborder">
                                        @foreach ($penilaianData['penilaianData'] as $data)
                                        <tr class="search-items">
                                            <td
                                            class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-center">


                                            <a href="{{ route('ikd.showDetail', $data['dosen']->dosen_id) }}"
                                                class="text-info edit"> <i class="ti ti-list-details
 text-lg"></i></a>
                                        </td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $data['dosen']->nama_lengkap }}</td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $data['dosen']->prodi->nama_prodi }}</td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $data['dosen']->prodi->fakultas->nama_fakultas }}</td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-center">
                                                {{ $data['tahun_ajaran'] }}</td>
                                            {{-- @foreach ($data['criteria_scores'] as $score)
                                                    <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ number_format($score, 2) }}
                                            </td>
                                            @endforeach --}}
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 text-center">
                                                {{ number_format($data['ikd'], 2) }}</td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4 ">
                                                <span class="{{ $data['classification']['badgeClass'] }} ">
                                                {{ $data['classification']['badgeText'] }}  </span></td>
                                            {{-- <tr class="{{ $data['classification']['badgeClass'] }}">
                                            <td colspan="2" class="py-2 px-4">Hasil Index Kinerja Dosen</td>
                                            <td class="py-2 px-4">{{ $data['classification']['badgeText'] }}</td>
                                        </tr> --}}

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <div class="flex justify-center items-center gap-x-5 mt-4">
                                    <div class="pagination-wrapper">
                                        {{ $penilaianData['dosenPagination']->links('vendor.pagnation.custom') }}
                                    </div>
                                    <!-- Go To Page -->
                                    <form id="go-to-page-form" action="{{ url()->current() }}" method="GET"
                                        class="flex items-center gap-x-2 mt-3">
                                        <span class="text-sm text-gray-800 whitespace-nowrap dark:text-white">Go
                                            to</span>
                                        <input type="number" name="page" id="go-to-page"
                                            class="min-h-[32px] py-1 px-2.5 block w-12 border-gray-200 rounded-md text-sm text-center focus:border-primary focus:ring-primary [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <span
                                            class="text-sm text-gray-800 whitespace-nowrap dark:text-white">page</span>
                                        <input type="hidden" name="items_per_page" value="{{ $itemsPerPage }}">
                                        <button type="submit" class="hidden"></button>
                                    </form>
                                    <!-- End Go To Page -->
                                    <!-- Items Per Page -->

                                    <!-- End Items Per Page -->









                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>





            @endsection
            <script>
                document.getElementById('go-to-page').addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        document.getElementById('go-to-page-form').submit();
                    }
                });
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function () {
                    // Simpan nilai prodi yang dipilih sebelumnya
                    var selectedProdi = "{{ old('prodi_id') }}";

                    // Simpan nilai fakultas yang dipilih sebelumnya
                    var selectedFakultas = "{{ old('fakultas_id') }}";

                    // Fungsi untuk mengambil prodi berdasarkan fakultas yang dipilih
                    function getProdiByFakultas(fakultasId) {
                        $.ajax({
                            type: 'GET',
                            url: '/get-prodi/' + fakultasId,
                            success: function (data) {
                                $('#prodi_id').empty();
                                $('#prodi_id').append("<option value=''>Pilih Prodi</option>");
                                $.each(data, function (key, value) {
                                    var selected = (selectedProdi == key) ? 'selected' : '';
                                    $('#prodi_id').append("<option value='" + key + "' " +
                                        selected + ">" + value + "</option>");
                                });
                            }
                        });
                    }

                    // Atur ulang dropdown prodi saat halaman dimuat
                    if (selectedFakultas) {
                        getProdiByFakultas(selectedFakultas);
                    }

                    // Event handler untuk perubahan pada dropdown fakultas
                    $('#fakultas_id').change(function () {
                        var fakultasId = $(this).val();
                        if (fakultasId) {
                            getProdiByFakultas(fakultasId);
                        } else {
                            $('#prodi_id').empty();
                            $('#prodi_id').append("<option value=''>Pilih Prodi</option>");
                        }
                    });
                });
            </script>











            {{--
@extends('layouts.mains')
@section('content')
<!----Breadcrumb Start---->
<div class="pt-5">
    <div class="container full-container py-5">
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Data Index Kinerja Dosen
                            Janabadra</h4>
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
            <li class="flex items-center text-sm text-link dark:text-darklink leading-none" aria-current="page">
                Data IKD Dosen
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
<!----Breadcrumb Start---->




<!---Contact Card--->

<div class="card mb-6 ">
    <div class="card-body">
        <div class="grid grid-cols-12 gap-6">
            <div class="lg:col-span-4 md:col-span-12 sm:col-span-12 col-span-12 ">
                <form class="relative max-w-64">
                    <input type="text" class="form-control product-search pl-11 py-2" id="input-search"
                        placeholder="Search dosen..." />
                    <i
                        class="ti ti-search absolute  start-3  text-bodytext dark:text-darklink text-xl translate-y-1/2 -top-2"></i>
                </form>
            </div>
            <div class="lg:col-span-8 md:col-span-12 sm:col-span-12 col-span-12">
                <div class="flex justify-end items-center gap-3">
                    <div class="action-btn show-btn" style="display: none">
                        <a href="javascript:void(0)"
                            class="delete-multiple btn flex gap-2 items-center btn-light-error">
                            <i class="ti ti-trash text-lg leading-none"></i>
                            Delete All Row
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">

                        <form method="GET" action="">
                            <select name="tahun_ajaran">
                                <!-- Tambahkan opsi tahun ajaran di sini -->
                                <option value="2023/2024">2023/2024</option>
                                <option value="2022/2023">2022/2023</option>
                                <!-- dst -->
                            </select>
                            <select name="semester">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                        <table class="table search-table min-w-full divide-y divide-border dark:divide-darkborder ">
                            <thead>
                                <tr>
                                    <th
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        Dosen</th>
                                    @foreach($criteria as $criterion)
                                    <th
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        {{ $criterion->nama_kriteria }}</th>
                                    @endforeach
                                    <th
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        Nilai IKD</th>
                                    <th
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        Hasil IKD</th>
                                    <th
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border dark:divide-darkborder">
                                @foreach($penilaianData as $data)
                                <tr class="search-items">
                                    <td
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        {{ $data['dosen']->nama_lengkap }}</td>
                                    @foreach($data['criteria_scores'] as $score)
                                    <td
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        {{ number_format($score, 2) }}</td>
                                    @endforeach
                                    <td
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        {{ number_format($data['ikd'], 2) }}</td>
                                    <td
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        {{ $data['classification'] }}</td>
                                    <td
                                        class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                        <a href=""
                                            class="btn-md text-sm font-medium rounded-md border border-transparent bg-primary hover:bg-primaryemphasis text-white ">
                                            Rincian Data</a>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection --}}

{{--
                                <table class="table search-table min-w-full divide-y divide-border dark:divide-darkborder">
                                    <thead>
                                        <tr>
                                            <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Dosen</th>
                                            @foreach($criteria as $criterion)
                                                <th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $criterion->nama_kriteria }}
</th>
@endforeach
<th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Nilai IKD</th>
<th class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">Hasil IKD</th>
</tr>
</thead>
<tbody class="divide-y divide-border dark:divide-darkborder">
    @foreach($penilaianData as $data)
    <tr class="search-items">
        <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
            {{ $data['dosen']->nama_lengkap }}</td>
        @foreach($criteria as $criterion)
        @php
        $score = $data['criteria_scores'][$criterion->nama_kriteria] ?? 'Belum Dinilai';
        @endphp
        <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
            {{ is_numeric($score) ? number_format($score, 2) : $score }}
        </td>
        @endforeach
        <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
            {{ number_format($data['ikd'], 2) }}</td>
        <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">{{ $score }}</td>
    </tr>
    @endforeach
</tbody>
</table> --}}
