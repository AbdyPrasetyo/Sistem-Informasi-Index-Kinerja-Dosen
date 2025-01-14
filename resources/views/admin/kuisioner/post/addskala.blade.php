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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Tambah Data Skala Penilaian</h4>
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
                                Form Tambah Data
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
                        <div class="col-span-12">
                                <form action="{{ route('skala.store') }}" method="POST">
                                    @csrf
                                        <div class="relative  mb-3 mt-3">
                                            <input type="text" name="kategori" id="hs-floating-input-kategori" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                            focus:pt-6
                                            focus:pb-2
                                            [&:not(:placeholder-shown)]:pt-6
                                            [&:not(:placeholder-shown)]:pb-2
                                            autofill:pt-6
                                            autofill:pb-2" placeholder="">
                                            <label for="hs-floating-input-kategori" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                            peer-focus:text-xs
                                            peer-focus:-translate-y-1.5
                                            peer-focus:text-gray-500
                                            peer-[:not(:placeholder-shown)]:text-xs
                                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                            peer-[:not(:placeholder-shown)]:text-gray-500">Kategori</label>
                                            @error('kategori')
                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                          @enderror
                                        </div>

                                        <div class="relative  mb-3 mt-3">
                                            <input type="number" name="nilai" id="hs-floating-input-nilai" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                            focus:pt-6
                                            focus:pb-2
                                            [&:not(:placeholder-shown)]:pt-6
                                            [&:not(:placeholder-shown)]:pb-2
                                            autofill:pt-6
                                            autofill:pb-2" placeholder="">
                                            <label for="hs-floating-input-kategori" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                            peer-focus:text-xs
                                            peer-focus:-translate-y-1.5
                                            peer-focus:text-gray-500
                                            peer-[:not(:placeholder-shown)]:text-xs
                                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                            peer-[:not(:placeholder-shown)]:text-gray-500">Nilai Skala</label>
                                            @error('nilai')
                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                          @enderror
                                        </div>

                                        <div class="flex gap-3 justify-start mt-6">
                                            <button class="btn btn-md " type="submit">Simpan</button>
                                            <a class="btn btn-light-error" href="{{ url('skala') }}">Batal</a>
                                           </div>


                                 </form>
                </div>
                </div>
                </div>
                </div>
                </div>


            </div>
            </div>
        </div>


{{-- end card --}}









@endsection
