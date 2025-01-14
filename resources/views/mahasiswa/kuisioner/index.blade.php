'{{-- @extends('layouts.mains')

@section('content')
<div class="container mx-auto p-4">

    @if (session('error'))
    <div class="bg-blue-500 text-white p-4 mb-4">
        {{ session('error') }}
</div>
@endif
<h1 class="text-2xl font-bold mb-4">Daftar Dosen untuk Kuisioner</h1>
<table class="w-full table-auto">
    <thead class="bg-darkgray text-white">
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Nama Dosen</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dosenKelas as $index => $dosen)
        <tr>
            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
            <td class="border px-4 py-2">{{ $dosen->nama_lengkap }}</td>
            <td class="border px-4 py-2">
                @if($dosen->sudahDiisi)
                <span class="text-green-500">Sudah Diisi</span>
                @else
                <span class="text-red-500">Belum Diisi</span>
                @endif
            </td>
            <td class="border px-4 py-2">
                @if($dosen->sudahDiisi)
                <a href="{{ route('kuisioner.show', $dosen->dosen_id) }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Lihat Hasil</a>
                @else
                <a href="{{ route('kuisioner.form', $dosen->dosen_id) }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-green-700">Isi Kuisioner</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection --}}



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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Data Pengisian Kuisioner Index Kinerja
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
                                Data Dosen
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




        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        <div class="card mb-6 ">
            <div class="card-body">
                <div class="grid grid-cols-12 gap-6">
                    <div class="lg:col-span-4 md:col-span-12 sm:col-span-12 col-span-12 ">
                        <form class="relative max-w-64">
                            <input type="text" class="form-control product-search pl-11 py-2" id="input-search"
                                placeholder="Search Dosen..." />
                            <i
                                class="ti ti-search absolute  start-3  text-bodytext dark:text-darklink text-xl translate-y-1/2 -top-2"></i>
                        </form>
                    </div>

                </div>

                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">

                                <table
                                    class="table search-table min-w-full divide-y divide-border dark:divide-darkborder">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                No</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Nama Dosen</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Status</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Aksi</th>


                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-border dark:divide-darkborder">

                                        @foreach($dosenKelas as $index => $dosen)
                                        <tr class="search-items">
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">

                                                <div
                                                    class="inline-flex flex-nowrap items-center bg-white border border-border rounded-full p-1.5 pe-3 dark:bg-transparent dark:border-darkborder">
                                                    <img class="me-1.5 inline-block h-6 w-6 rounded-full "
                                                        src="../assets/images/profile/user-4.jpg"
                                                        alt="Image Description">
                                                    <div
                                                        class="whitespace-nowrap text-sm font-medium text-dark dark:text-white">
                                                        {{ $dosen->nama_lengkap }}
                                                    </div>
                                                </div>

                                            </td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                @if($dosen->sudahDiisi)
                                                <span
                                                    class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-lightsuccess text-success rounded-full  dark:bg-darksuccess dark:text-success">
                                                    <svg class="flex-shrink-0 w-3 h-3"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                                                        <path d="m9 12 2 2 4-4" /></svg>
                                                    Sudah Diisi
                                                </span>


                                                @else
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-lighterror text-error rounded-full  dark:bg-darkerror dark:text-error">
                                                    <svg class="flex-shrink-0 w-3 h-3"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                                                        <path d="M12 9v4" />
                                                        <path d="M12 17h.01" /></svg>
                                                    Belum Diisi
                                                </span>
                                                @endif
                                            </td>
                                            <td
                                                class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                @if($dosen->sudahDiisi)

                                                <a href="{{ route('kuisioner.show', $dosen->dosen_id) }}"
                                                    class="btn-md text-sm font-medium rounded-md border border-transparent bg-success hover:bg-successemphasis text-white">Lihat
                                                    Hasil</a>
                                                @else
                                                <a href="{{ route('kuisioner.form', $dosen->dosen_id) }}"
                                                    class="btn-md text-sm font-medium rounded-md border border-transparent bg-error hover:bg-erroremphasis text-white  ">Isi
                                                    Kuisioner</a>
                                                @endif
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


        <!---Contact Card End--->

        @endsection
        '
