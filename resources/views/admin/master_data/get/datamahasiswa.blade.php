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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Data Mahasiswa Universitas
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
                                Data Mahasiswa
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
                <div class="grid grid-cols-12 gap-6">
                    <div class="lg:col-span-4 md:col-span-12 sm:col-span-12 col-span-12 ">
                        <form class="relative max-w-64">
                            <input type="text" class="form-control product-search pl-11 py-2" id="input-search"
                                placeholder="Search Mahasiswa..." />
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
                            <a href="{{ route('mahasiswa/add/.create') }}"
                                class="btn  flex gap-2 items-center ">
                                <i class="ti ti-users text-white text-lg leading-none"></i>
                                Tambah Data Mahasiswa
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
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
                                @include('sweetalert::alert')
                                <table
                                    class="table search-table min-w-full divide-y divide-border dark:divide-darkborder">
                                    <thead>
                                        <tr>
                                            <th class="p-4 ps-0">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input rounded-sm"
                                                            id="contact-check-all" />
                                                        <label class="form-check-label" for="contact-check-all"></label>
                                                        <span class="new-control-indicator"></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Email</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Nama</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                NIM</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Prodi</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Angkatan</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Gender</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Tempat Lahir</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Tanggal Lahir</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Agama</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Status</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Alamat</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Telepon</th>
                                            <th scope="col"
                                                class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                                Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-border dark:divide-darkborder">
                                        @foreach ($mahasiswa as $mhs)
                                        <tr class="search-items">
                                            <td class="p-4 ps-0 whitespace-nowrap">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input rounded-sm contact-chkbox" id="checkbox1" />
                                                        <label class="form-check-label" for="checkbox1"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->user->email }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->nama_lengkap }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->nim }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->prodi->nama_prodi }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->angkatan }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->gender }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->tempat_lahir }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->tanggal_lahir }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->agama }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->status_mahasiswa }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->alamat }}
                                            </td>
                                            <td class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                {{ $mhs->telepon }}
                                            </td>
                                            <td class="text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                                <div class="action-btn flex gap-3">
                                                    <a href="{{ route('mahasiswa.edit', $mhs->mahasiswa_id) }}" class="text-info edit">
                                                        <i class="ti ti-pencil text-lg"></i>
                                                    </a>
                                                    {{-- <a href="javascript:void(0)" class="text-dark delete">
                                                        <i
                                                            class="ti ti-trash text-lg text-bodytext dark:text-darklink"></i>
                                                    </a> --}}
                                                    <form action="{{ route('mahasiswa.destroy', $mhs->mahasiswa_id) }}"
                                                        method="POST" id="delete-form-{{ $mhs->mahasiswa_id }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="button" class="text-dark delete-btn" data-id="{{ $mhs->mahasiswa_id }}">
                                                            <i class="ti ti-trash text-lg text-bodytext dark:text-darklink "></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>






                                <div class="flex justify-center items-center gap-x-5 mt-4">
                                    <div class="pagination-wrapper">
                                        {{ $mahasiswa->links('vendor.pagnation.custom') }}
                                    </div>
                                    <!-- Go To Page -->
                                    <form id="go-to-page-form" action="{{ url()->current() }}" method="GET" class="flex items-center gap-x-2">
                                        <span class="text-sm text-gray-800 whitespace-nowrap dark:text-white">Go to</span>
                                        <input type="number" name="page" id="go-to-page" class="min-h-[32px] py-1 px-2.5 block w-12 border-gray-200 rounded-md text-sm text-center focus:border-primary focus:ring-primary [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <span class="text-sm text-gray-800 whitespace-nowrap dark:text-white">page</span>
                                        <input type="hidden" name="items_per_page" value="{{ $itemsPerPage }}">
                                        <button type="submit" class="hidden"></button>
                                    </form>
                                    <!-- End Go To Page -->
                                    <!-- Items Per Page -->
                                    <form id="items-per-page-form" action="{{ url()->current() }}" method="GET" class="hs-dropdown relative inline-flex [--placement:top-left]">
                                        <select name="items_per_page" id="items-per-page" class="min-h-[32px] py-1 px-2 inline-flex items-center gap-x-1 text-sm rounded-md border border-gray-200 text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onchange="this.form.submit()">
                                            <option value="5" {{ $itemsPerPage == 5 ? 'selected' : '' }}>5 per page</option>
                                            <option value="10" {{ $itemsPerPage == 10 ? 'selected' : '' }}>10 per page</option>
                                            <option value="20" {{ $itemsPerPage == 20 ? 'selected' : '' }}>20 per page</option>
                                            <option value="50" {{ $itemsPerPage == 50 ? 'selected' : '' }}>50 per page</option>
                                            <option value="100" {{ $itemsPerPage == 100 ? 'selected' : '' }}>100 per page</option>
                                        </select>
                                    </form>
                                    <!-- End Items Per Page -->
                                </div>





                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>





        <script>
            document.getElementById('go-to-page').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    document.getElementById('go-to-page-form').submit();
                }
            });
        </script>



        <!---Contact Card End--->

        @endsection
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.all.min.js"></script>

        <script>
            $(document).on('click', '.delete-btn', function () {
             var mahasiswa_id = $(this).data('id');
             Swal.fire({
                 title: 'Ingin menghapus data ini?',
                 text: "Menghapus data ini akan mengakibatkan data tidak dapat dipulihkan!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     // Submit the corresponding form
                     $('#delete-form-' + mahasiswa_id).submit();
                 }
             });
         });
         </script>
