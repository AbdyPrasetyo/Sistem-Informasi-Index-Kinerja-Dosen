@extends('layouts.mains')

@section('content')

<!-- Breadcrumb Start -->
<div class="pt-5">
    <div class="container full-container py-5">
        <div class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Perubahan Data Admin</h4>
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
                                Form Ubah Data
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

<!-- Breadcrumb End -->

<div class="card mb-6 ">
    <div class="card-body">
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <div class="col-span-12">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                        <div class="relative  ">
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" id="hs-floating-input-username" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-username" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Username</label>
                        </div>
                        @error('name')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>

                        <div class="col-span-1">
                        <div class="relative ">
                            <input type="password" name="password" id="hs-floating-input-password" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-password" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Password</label>
                        </div>
                        @error('password')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>

                        <div class="col-span-1">
                        <div class="relative ">
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" id="hs-floating-input-email" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-email" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Email</label>
                        </div>
                        @error('email')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>




                            <div class="col-span-1">

                        <div class="relative ">
                            <input type="text" name="nip" value="{{ old('nip', $admin->nip) }}" id="hs-floating-input-nip" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-nip" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">NIP</label>
                        </div>
                        @error('nip')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>


                        <div class="col-span-1">
                        <div class="relative ">
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $admin->nama_lengkap) }}" id="hs-floating-input-nama_lengkap" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-nama_lengkap" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Nama Lengkap</label>
                        </div>
                        @error('nama_lengkap')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>





                            <div class="col-span-1">
                        <div class="relative">
                            <select id="form_InputSelect3" name="gender" class="peer p-4 pe-9 form-control
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2">
                            <option selected disabled>Pilih Gender </option>
                            <option value="Pria"
                                {{ old('gender', $admin->gender) == 'Pria' ? 'selected' : '' }}>
                                Pria</option>
                            <option value="Wanita"
                                {{ old('gender', $admin->gender) == 'Wanita' ? 'selected' : '' }}>
                                Wanita</option>
                            </select>
                            <label for="form_InputSelect3" class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Jenis Kelamin</label>
                        </div>
                        @error('gender')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>




                        <div class="col-span-1">
                        <div class="relative ">
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $admin->tempat_lahir) }}" id="hs-floating-input-tempat_lahir" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-tempat_lahir" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Tempat Lahir</label>
                        </div>
                        @error('tempat_lahir')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>

                        <div class="col-span-1">
                        <div class="relative ">
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $admin->tanggal_lahir) }}" id="hs-floating-input-tanggal_lahir" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-tanggal_lahir" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Tanggal Lahir</label>
                        </div>
                        @error('tanggal_lahir')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>





                            <div class="col-span-1">
                        <div class="relative">
                            <select id="form_InputSelect3" name="agama" class="peer p-4 pe-9 form-control
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2">
                            <option selected disabled>Pilih Agama </option>
                            <option value="Islam" {{ old('agama', $admin->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama', $admin->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama', $admin->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama', $admin->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Budha" {{ old('agama', $admin->agama) == 'Budha' ? 'selected' : '' }}>Islam</option>
                            </select>
                            <label for="form_InputSelect3" class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Agama</label>
                        </div>
                        @error('agama')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>




                        <div class="col-span-1">
                        <div class="relative">
                            <select id="form_InputSelect3" name="status_admin" class="peer p-4 pe-9 form-control
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2">
                            <option selected>Pilih Status </option>
                            <option value="AKTIF" {{ old('status_admin', $admin->status_admin) == 'AKTIF' ? 'selected' : '' }}> AKTIF</option>
                            <option value="TIDAK AKTIF" {{ old('status_admin', $admin->admin) == 'TIDAK AKTIF' ? 'selected' : '' }}>TIDAK AKTIF</option>
</select>
                            </select>
                            <label for="form_InputSelect3" class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Status Keaktifan</label>
                        </div>
                        @error('status_admin')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>

                        <div class="col-span-1">
                        <div class="relative">
                            <input type="text" name="telepon" value="{{ old('telepon', $admin->telepon) }}" id="hs-floating-input-telepon" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">
                            <label for="hs-floating-input-telepon" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Telepon</label>
                        </div>
                        @error('telepon')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>

                            <div class="col-span-1">
                        <div class="relative ">
                            <textarea name="alamat" id="hs-floating-input-alamat" rows="3" class="peer p-2.5 block w-full border-gray-200 rounded-md text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                            focus:pt-6
                            focus:pb-2
                            [&:not(:placeholder-shown)]:pt-6
                            [&:not(:placeholder-shown)]:pb-2
                            autofill:pt-6
                            autofill:pb-2" placeholder="">{{ old('alamat', $admin->alamat) }}</textarea>
                            <label for="hs-floating-input-alamat" class="absolute top-0 start-0 p-2.5 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Alamat</label>
                        </div>
                        @error('alamat')
                        <p class="text-sm text-error mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                      @enderror
                        </div>
                        </div>

                        <div class="flex gap-3 justify-start mt-6">
                            <button class="btn btn-md " type="submit">Simpan</button>
                            <a class="btn btn-light-error" href="{{ url('admin') }}">Batal</a>
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
</div>

@endsection
