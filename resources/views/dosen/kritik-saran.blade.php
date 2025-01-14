'@extends('layouts.mains')
@section('content')


<!-- Main Content -->
<div class="pt-6">
    <div class="container full-container py-5">
        <!----Breadcrumb Start---->
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Kritik Dan Saran</h4>
                        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                            <li class="flex items-center">
                                <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                    href="../main/index.html">
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="p-0.5 rounded-full bg-dark dark:bg-darklink mx-2.5 flex items-center"></div>
                            </li>
                            <li class="flex items-center text-sm text-link dark:text-darklink leading-none"
                                aria-current="page">
                                Kritik Saran
                            </li>
                        </ol>
                    </div>
                    <div class="col-span-3 -mb-10">
                        <div class="flex justify-center">
                            <img src="../assets/images/breadcrumb/ChatBc.png" alt=""
                                class="md:-mb-7 -mb-4 h-full w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----Breadcrumb End---->

        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="{{ asset('assets/images/background/profilebg.jpg') }}" alt="" class="w-full">
                <div class="grid grid-cols-12 gap-6">
                    <div class="lg:col-span-4 lg:order-1 order-2 col-span-12">
                        <div class="flex items-center justify-around lg:p-6 p-0">
                            <div class="text-center">
                                <i class="ti ti-message text-xl block mb-1 text-bodytext dark:text-darklink"></i>
                                <h4 class="text-xl">{{ $jumlahKritikSaran }}</h4>
                                <p class="text-bodytext dark:text-darklink text-base">Krtitik Saran</p>
                            </div>
                            <div class="text-center">
                                <i
                                    class="ti ti-file-description text-xl block mb-1 text-bodytext dark:text-darklink"></i>
                                <h4 class="text-xl">{{ $totalMataKuliah }}</h4>
                                <p class="text-bodytext dark:text-darklink text-base">Matakuliah</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-user-check  text-xl block mb-1 text-bodytext dark:text-darklink"></i>
                                <h4 class="text-xl">{{ $jumlahMahasiswa }}</h4>
                                <p class="text-bodytext dark:text-darklink text-base">Mahasiswa</p>
                            </div>

                        </div>
                    </div>
                    <div class="lg:col-span-4  lg:order-2 order-1  col-span-12">
                        <div class="-mt-14">
                            <div class="flex items-center justify-center mb-2">
                                <div class="linear-gradient flex items-center justify-center rounded-full"
                                    style="width: 110px; height: 110px;" ;>
                                    <div class="border-4 border-body flex items-center justify-center rounded-full overflow-hidden"
                                        style="width: 100px; height: 100px;" ;>
                                        <img src="../assets/images/profile/user-1.jpg" alt="" class="w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="card-title ">{{ Auth::user()->dosen->nama_lengkap }}</h5>
                                <p class="
                              ">Dosen</p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-4 order-last col-span-12 lg:mb-0 mb-6">
                        <ul class="flex items-center justify-center  h-full gap-4">
                            <li class="relative">
                                <a class="flex items-center justify-center btn p-0  rounded-full h-8 w-8 text-white"
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook text-lg"></i>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex items-center justify-center btn p-0 bg-info hover:bg-blue-500  rounded-full h-8 w-8 text-white"
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter text-lg"></i>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex items-center justify-center  btn p-0 btn-secondary  rounded-full h-8 w-8 text-white"
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-dribbble text-lg"></i>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex items-center justify-center  btn p-0 btn-error rounded-full h-8 w-8 text-white"
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-youtube text-lg"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <!----------->
                <div class="bg-lightprimary dark:bg-darkprimary rounded-md px-3">
                    <nav class="flex justify-end space-x-3" aria-label="Tabs" role="tablist">
                        <button type="button"
                            class="hs-tab-active:border-primary hs-tab-active:text-primary py-2 px-3 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap  text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                            id="Profile-tab" data-hs-tab="#profile" aria-controls="profile" role="tab">

                            <i class="ti ti-message text-xl"></i><span class="md:flex hidden">Kritik Saran</span>
                        </button>
                        <button type="button"
                            class="hs-tab-active:border-primary hs-tab-active:text-primary py-2 px-3 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap  text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                            id="Followers-tab" data-hs-tab="#followers" aria-controls="followers" role="tab">
                            <i class="ti ti-file-description text-xl"></i><span class="md:flex hidden">Matakuliah</span>
                        </button>
                        <button type="button"
                            class="hs-tab-active:border-primary hs-tab-active:text-primary py-2 px-3 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap  text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                            id="Friends-tab" data-hs-tab="#friends" aria-controls="friends" role="tab">
                            <i class="ti ti-user-check  text-xl"></i><span class="md:flex hidden">Mahasiswa</span>
                        </button>

                    </nav>
                </div>
            </div>


            <!----------->

        </div>

        <!---Tabs Content--->
        <div class="mt-6">
            <div id="profile" role="tabpanel" aria-labelledby="Profile-tab">
                <div class="grid grid-cols-12 gap-6">
                    <div class="lg:col-span-4 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="card shadow-none border border-border dark:border-darkborder mb-6">
                            <div class="card-body ">

                                <ul class="list-unstyled mb-0">
                                    <li class="flex items-center gap-3 mb-4">
                                        <i class="ti ti-user-check text-xl text-bodytext dark:text-darklink"></i>
                                        <h6 class="text-base">
                                            {{ Auth::user()->dosen->nama_lengkap }}
                                        </h6>
                                    </li>
                                    <li class="flex items-center gap-3 mb-4">
                                        <i class="ti ti-id-badge-2 text-xl text-bodytext dark:text-darklink"></i>
                                        <h6 class="text-base">
                                            {{ Auth::user()->dosen->nidn }}</h6>
                                    </li>
                                    <li class="flex items-center gap-3 mb-4">
                                        <i class="ti ti-mail text-xl text-bodytext dark:text-darklink"></i>
                                        <h6 class="text-base">
                                            {{ Auth::user()->email }}</h6>
                                    </li>

                                    <li class="flex items-center gap-3 mb-2">
                                        <i class="ti ti-map-pin text-xl text-bodytext dark:text-darklink"></i>
                                        <h6 class="text-base">
                                            {{ Auth::user()->dosen->alamat }}</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="lg:col-span-8 md:col-span-12 sm:col-span-12 col-span-12">

                        <!--Card 2-->
                        <div class="card border border-border dark:border-darkborder shadow-none mb-6">
                            <div class="card-body ">
                                <div class="flex items-center gap-3">
                                    <img src="../assets/images/profile/user-1.jpg" alt=""
                                        class="rounded-full h-10 w-10">
                                    <h6 class="text-base">Mathew
                                        Anderson</h6>

                                </div>

                                @forelse ($kritikSaranList as $index => $kritikSaran)


                                <!-----Comments----->
                                <div class="card shadow-none bg-lightgray dark:bg-darkprimary mb-6 mt-2">
                                    <div class="card-body">
                                        <div class="flex items-center gap-4">
                                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                                class="rounded-full h-8 w-8">
                                            <h6 class="text-base">
                                                Mahasiswa</h6>
                                            <span class="flex gap-2 items-center text-xs text-bodytext dark:text-darklink
                                            ">
                                                <i class="h-2 w-2 bg-link  dark:bg-darklink
                                                rounded-full  opacity-30"></i>
                                                8 min
                                                ago
                                            </span>
                                        </div>
                                        <h1 class="mt-2">Kritik:</h1>
                                        <p class=" my-4">
                                            {{ $kritikSaran['kritik'] }}
                                        </p>
                                        <h1 class="mt-2">Saran:</h1>
                                        <p class=" my-4">
                                            {{ $kritikSaran['saran'] }}
                                        </p>


                                    </div>
                                </div>
                                <!-----Comments ends----->
                                @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center">Belum ada kritik dan saran.</td>
                                </tr>
                                @endforelse

                                <!-----Comments ends----->
                            </div>



                        </div>







                    </div>
                </div>

            </div>
            <div id="followers" class="hidden" role="tabpanel" aria-labelledby="Followers-tab">
                <div class="sm:flex items-center justify-between mt-3 mb-4">
                    <h3 class="mb-3 sm:mb-0 font-semibold text-dark dark:text-white text-2xl gap-2 flex items-center">
                        Matakuliah
                        <span
                            class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">{{ $totalMataKuliah }}</span>
                    </h3>
                    <form class="relative">
                        <input type="text" class="form-control search-chat py-2 ps-10" id="text-srh"
                            placeholder="Search Followers">
                        <i
                            class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                    </form>
                </div>

                <div class="grid grid-cols-12 gap-6">

                    @foreach ($kelas as $kls)


                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 col-span-12">
                        <div class="card">
                            <div class="card-body py-5 flex items-center gap-4">
                                <img src="../assets/images/profile/user-8.jpg" alt="" class="rounded-full h-10 w-10">
                                <div class="">
                                    <h5 class="text-lg mb-0 leading-normal">
                                        {{ $kls->matkul->nama_matakuliah }}</h5>
                                    <h6 class="text-lg mb-0 leading-normal">
                                        {{ $kls->tahun_ajaran }}</h6>
                                    <span
                                        class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">                       {{ $kls->matkul->sks }}
                                        SKS</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endforeach




                </div>
            </div>


            <div id="friends" class="hidden" role="tabpanel" aria-labelledby="Friends-tab">
                <div class="sm:flex items-center justify-between mt-3 mb-4">
                    <h3 class="mb-3 sm:mb-0 font-semibold text-dark dark:text-white text-2xl gap-2 flex items-center">
                        Mahasiswa
                        <span
                            class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit"> </span>
                    </h3>
                    <form class="relative">
                        <input type="text" class="form-control search-chat py-2 ps-10" id="Mahasiswa"
                            placeholder="Search Mahasiswa">
                        <i
                            class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                    </form>
                </div>

                <div class="grid grid-cols-12 gap-6">


                    @foreach ($kelas as $kelasItem)
                    @foreach ($kelasItem->krs as $krsItem)
                        @php
                            $mahasiswa = $krsItem->mahasiswa;
                        @endphp

                        <div class="lg:col-span-4 md:col-span-6 col-span-12" id="Mahasiswa">
                            <div class="card overflow-hidden">
                                <div class="card-body pb-5 text-center">
                                    <img src="../assets/images/profile/user-7.jpg" alt="" class="rounded-full mb-3 h-20 w-20 mx-auto">
                                    <h5 class="text-lg mb-0 leading-normal">{{ $mahasiswa->nama_lengkap }}</h5>
                                    <span class="text-xs text-bodytext dark:text-darklink">{{ $kelasItem->tahun_ajaran }}</span>
                                </div>
                                <ul class="px-3 py-3 bg-lightgray dark:bg-darkprimary flex items-center justify-center mb-0 gap-4 border-t border-border dark:border-darkborder">
                                    <li class="position-relative">
                                        <a class="text-primary text-lg" href="javascript:void(0)">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative">
                                        <a class="text-error text-lg" href="javascript:void(0)">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative">
                                        <a class="text-info text-lg" href="javascript:void(0)">
                                            <i class="ti ti-brand-github"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative">
                                        <a class="text-secondary text-lg" href="javascript:void(0)">
                                            <i class="ti ti-brand-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                </div>
            </div>



        </div>
    </div>
    <!---Tabs Content End--->
</div>
</div>
</div>
<!-- Main Content End -->























@endsection
'
