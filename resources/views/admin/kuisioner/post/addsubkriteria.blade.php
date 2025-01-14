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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Tambah Data SubKriteria</h4>
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
                                <form action="{{ route('subkriteria.store') }}" method="POST">
                                    @csrf
                                           <div class="lg:col-span-12 ">
                                            <h6 class="card-title mb-2">Kriteria Kuisioner</h6>
                                    <div class="relative mb-3">
                                        <select id="form_InputSelect3" name="kriteria_id" class="peer p-4 pe-9 form-control
                                        focus:pt-6
                                        focus:pb-2
                                        [&:not(:placeholder-shown)]:pt-6
                                        [&:not(:placeholder-shown)]:pb-2
                                        autofill:pt-6
                                        autofill:pb-2">
                                        <option disabled selected>Pilih Krteria </option>
                                        @foreach($kriteria as $kr)
                                        <option value="{{ $kr->kriteria_id }}">{{ $kr->nama_kriteria }}</option>
                                        @endforeach


                                        </select>
                                        <label for="form_InputSelect3" class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                        peer-focus:text-xs
                                        peer-focus:-translate-y-1.5
                                        peer-focus:text-gray-500
                                        peer-[:not(:placeholder-shown)]:text-xs
                                        peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                        peer-[:not(:placeholder-shown)]:text-gray-500">Nama Kriteria</label>
                                        @error('kriteria_id')
                                        <span
                                        class="validation-text text-error">{{ $message }}</span>
                                      @enderror
                                    </div>


                                            <div class="contact-name">
                                                <h6 class="card-title mb-2">Sub Kriteria Kuisioner</h6>
                                                    <textarea name="nama_subkriteria" placeholder="Nama Subkriteria kuisioner"  id="c-name" cols="30" rows="5" class="form-control"></textarea>
                                                    @error('nama_subkriteria')
                                        <span
                                        class="validation-text text-error">{{ $message }}</span>
                                      @enderror
                                            </div>
                                        </div>


                                        <div class="flex gap-3 justify-start mt-6">
                                            <button class="btn btn-md " type="submit">Simpan</button>
                                            <a class="btn btn-light-error" href="{{ url('subkriteria') }}">Batal</a>
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
