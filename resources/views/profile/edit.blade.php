{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
</h2>
</x-slot> --}}
@extends('layouts.mains')
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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Account Setting</h4>
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
                                Account Setting
                            </li>
                        </ol>
                    </div>
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
                    <script src="{{ asset('js/app.js') }}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    @include('sweetalert::alert')
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

        <div class="card">
            <div class>
                <nav class="flex space-x-3" aria-label="Tabs" role="tablist">
                    <button type="button"
                        class="hs-tab-active:border-primary hs-tab-active:text-primary py-5 px-4 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap  text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                        id="account-tab" data-hs-tab="#account" aria-controls="account" role="tab">
                        <i class="ti ti-user-circle text-xl"></i><span class="md:flex hidden">Profile</span>
                    </button>


                    <button type="button"
                        class="hs-tab-active:border-primary hs-tab-active:text-primary py-5 px-4 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap  text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Security-tab" data-hs-tab="#Security" aria-controls="Security" role="tab">
                        <i class="ti ti-lock  text-xl"></i><span class="md:flex hidden">Security</span>
                    </button>
                </nav>
            </div>
            <div class="card-body">
                <!-- Account Tab -->
                <div id="account" role="tabpanel" aria-labelledby="account-tab">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="lg:col-span-6 col-span-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change
                                        Profile</h5>
                                    <p class="card-subtitle">Change
                                        your profile picture
                                        from here</p>
                                    <div class="text-center">
                                        <img src="../assets/images/profile/user-1.jpg"
                                            class="rounded-full h-[120px] mx-auto mt-6" />
                                        <div class="flex gap-3 justify-center my-6">
                                            <button class="btn">Upload</button>
                                            <button class="btn btn-light-error">Reset</button>
                                        </div>
                                        <p class="card-subtitle">Allowed
                                            JPG, GIF or PNG.
                                            Max size of
                                            800K</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check())

                        @if(Auth::user()->role == 1)
                        <div class="col-span-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Personal
                                        Details</h5>
                                    <p class="card-subtitle">To
                                        change your personal
                                        detail , edit and
                                        save from here</p>

                                    <form class="mt-6" <form class="mt-6" action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Username</label>
                                                        <input type="text" value="{{ old('name', $user->name) }}" class="form-control py-2" name="name">
                                                        @error('name')
                                                        <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                      @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Nama Lengkap</label>
                                                            <input type="text" value="{{ old('nama_lengkap', $user->admin->nama_lengkap) }}" class="form-control py-2" name="nama_lengkap">
                                                            @error('nama_lengkap')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                        </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Agama</label>
                                                            <select class="form-control py-2" name="agama">
                                                                <option value="Islam" {{ old('agama', $user->admin->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                <option value="Kristen" {{ old('agama', $user->admin->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                <option value="Katolik" {{ old('agama', $user->admin->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                <option value="Hindu" {{ old('agama', $user->admin->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                <option value="Budha" {{ old('agama', $user->admin->agama) == 'Budha' ? 'selected' : '' }}>Islam</option>
                                                            </select>
                                                            @error('agama')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tempat Lahir</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('tempat_lahir', $user->admin->tempat_lahir) }}"
                                                            name="tempat_lahir">
                                                            @error('tempat_lahir')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Alamat</label>
                                                            <textarea name="alamat"
                                                            cols="30" rows="5" class="form-control">{{ old('alamat', $user->admin->alamat) }}</textarea>
                                                            @error('alamat')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Email</label>
                                                        <input type="text" class="form-control py-2"
                                                            readonly value="{{ old('email', $user->email) }}">
                                                            @error('email')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">NIP</label>
                                                            <input type="text" class="form-control py-2" name="nip"
                                                            readonly value="{{ old('nip', $user->admin->nip) }}">
                                                            @error('nip')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Gender</label>
                                                            <select class="form-control py-2" name="gender">
                                                                <option value="Pria"
                                                                {{ old('gender', $user->admin->gender) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ old('gender', $user->admin->gender) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>

                                                            </select>
                                                            @error('gender')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tanggal Lahir</label>
                                                        <input type="date" class="form-control py-2" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->admin->tanggal_lahir) }}"
                                                           >
                                                           @error('tanggal_lahir')
                                                           <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                         @enderror
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Telepon</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('telepon', $user->admin->telepon) }}"
                                                            name="telepon">
                                                            @error('telepon')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-span-12">
                                                <div class="flex gap-3 justify-end mt-2">
                                                    <button type="submit" class="btn btn-md">Save</button>
                                                    <a href="{{ url('dashboard') }}" class="btn btn-light-error">Back</a>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Auth::user()->role == 2)
                        <div class="col-span-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Personal
                                        Details</h5>
                                    <p class="card-subtitle">To
                                        change your personal
                                        detail , edit and
                                        save from here</p>

                                    <form class="mt-6"  action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Username</label>
                                                        <input type="text" class="form-control py-2" name="name" value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                        <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                      @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Nama Lengkap</label>
                                                            <input type="text" class="form-control py-2" name="nama_lengkap" value="{{ old('nama_lengkap', $user->dosen->nama_lengkap) }}">
                                                            @error('nama_lengkap')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Prodi</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('prodi_id', $user->dosen->prodi->nama_prodi) }}"
                                                            readonly>
                                                            @error('prodi_id')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tempat Lahir</label>
                                                        <input type="text" class="form-control py-2"
                                                            name="tempat_lahir" value="{{ old('tempat_lahir', $user->dosen->tempat_lahir) }}">
                                                            @error('tempat_lahir')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Agama</label>
                                                            <select class="form-control py-2" name="agama">
                                                                <option value="Islam" {{ old('agama', $user->dosen->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                <option value="Kristen" {{ old('agama', $user->dosen->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                <option value="Katolik" {{ old('agama', $user->dosen->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                <option value="Hindu" {{ old('agama', $user->dosen->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                <option value="Budha" {{ old('agama', $user->dosen->agama) == 'Budha' ? 'selected' : '' }}>Islam</option>

                                                            </select>
                                                            @error('agama')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Email</label>
                                                        <input type="text" class="form-control py-2" name="email" value="{{ old('email', $user->email) }}"
                                                            readonly>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">NIDN</label>
                                                            <input type="text" class="form-control py-2" name="nidn" value="{{ old('nidn', $user->dosen->nidn) }}"
                                                           readonly>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Gender</label>
                                                            <select class="form-control py-2" name="gender">
                                                                <option value="Pria"
                                                                {{ old('gender', $user->dosen->gender) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ old('gender', $user->dosen->gender) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>
                                                            </select>
                                                            @error('gender')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tanggal Lahir</label>
                                                        <input type="date" class="form-control py-2" name="tanggal_lahir"
                                                           value="{{ old('tanggal_lahir', $user->dosen->tanggal_lahir) }}">
                                                           @error('tanggal_lahir')
                                                           <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                         @enderror
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Telepon</label>
                                                        <input type="text" class="form-control py-2"
                                                            name="telepon" value="{{ old('telepon', $user->dosen->telepon) }}">
                                                            @error('telepon')
                                                           <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                         @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lg:col-span-12">
                                                <label
                                                    class="text-dark dark:text-darklink font-semibold mb-2 block ">Alamat</label>
                                                    <textarea name="alamat"
                                                    cols="30" rows="5" class="form-control">{{ old('alamat', $user->dosen->alamat) }}</textarea>
                                                    @error('alamat')
                                                    <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                  @enderror
                                            </div>
                                            <div class="col-span-12">
                                                <div class="flex gap-3 justify-end mt-2">
                                                    <button class="btn btn-md" type="submit">Save</button>
                                                    <a href="{{ url('dashboard') }}" class="btn btn-light-error">Back</a>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(Auth::user()->role == 3)
                        <div class="col-span-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Personal
                                        Details</h5>
                                    <p class="card-subtitle">To
                                        change your personal
                                        detail , edit and
                                        save from here</p>

                                    <form class="mt-6" action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Username</label>
                                                        <input type="text" class="form-control py-2" name="name" value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                        <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                      @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Nama Lengkap</label>
                                                            <input type="text" class="form-control py-2" name="nama_lengkap" value="{{ old('nama_lengkap', $user->mahasiswa->nama_lengkap) }}">
                                                            @error('nama_lengkap')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                        </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Prodi</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('prodi_id', $user->mahasiswa->prodi->nama_prodi) }}"
                                                            readonly>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tempat Lahir</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('tempat_lahir', $user->mahasiswa->tempat_lahir) }}"
                                                            name="tempat_lahir">
                                                            @error('tempat_lahir')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Agama</label>
                                                            <select class="form-control py-2" name="agama">
                                                                <option value="Islam" {{ old('agama', $user->mahasiswa->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                <option value="Kristen" {{ old('agama', $user->mahasiswa->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                <option value="Katolik" {{ old('agama', $user->mahasiswa->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                <option value="Hindu" {{ old('agama', $user->mahasiswa->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                <option value="Budha" {{ old('agama', $user->mahasiswa->agama) == 'Budha' ? 'selected' : '' }}>Islam</option>

                                                            </select>
                                                            @error('agama')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Alamat</label>
                                                            <textarea name="alamat"
                                                            cols="30" rows="5" class="form-control">{{ old('alamat', $user->mahasiswa->alamat) }}</textarea>
                                                            @error('alamat')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="lg:col-span-6 col-span-12">
                                                <div class="flex flex-col gap-4">
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">
                                                            Email</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('email', $user->email) }}" readonly
                                                            >
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">NIM</label>
                                                            <input type="text" class="form-control py-2" name="nim"
                                                            value="{{ old('nim', $user->mahasiswa->nim) }}" readonly>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Gender</label>
                                                            <select class="form-control py-2" name="gender">
                                                                <option value="Pria"
                                                                {{ old('gender', $user->mahasiswa->gender) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ old('gender', $user->mahasiswa->gender) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>
                                                            </select>
                                                            @error('gender')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Tanggal Lahir</label>
                                                        <input type="date" class="form-control py-2" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->mahasiswa->tanggal_lahir) }}"
                                                           >
                                                           @error('tanggal_lahir')
                                                           <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                         @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Angkatan</label>
                                                        <input type="text" class="form-control py-2" readonly value="{{ old('angkatan', $user->mahasiswa->angkatan) }}"
                                                            name="angkatan">
                                                            @error('angkatan')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="text-dark dark:text-darklink font-semibold mb-2 block ">Telepon</label>
                                                        <input type="text" class="form-control py-2" value="{{ old('telepon', $user->mahasiswa->telepon) }}"
                                                            name="telepon">
                                                            @error('telepon')
                                                            <p class="text-sm text-error" id="hs-validation-name-error-helper">{{ $message }}</p>
                                                          @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-span-12">
                                                <div class="flex gap-3 justify-end mt-2">
                                                    <button class="btn btn-md" type="submit">Save</button>
                                                    <a href="{{ url('dashboard') }}" class="btn btn-light-error">Back</a>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                <!-- Account Tab  End -->





                <!-- Security Tab-->
                <div id="Security" class="hidden" role="tabpanel" aria-labelledby="Security-tab">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="lg:col-span-8 col-span-12">
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">Change
                                        Password</h5>
                                    <p class="card-subtitle">To
                                        change your password
                                        please confirm
                                        here</p>
                                    <form class="mt-6" method="post" action="{{ route('password.update') }}">
                                        @csrf
                                        @method('put')
                                        <div class="flex flex-col gap-4">
                                            <div>
                                                <label
                                                    class="text-dark dark:text-darklink font-semibold mb-2 block ">Current
                                                    Password</label>
                                                <input type="password" name="current_password" autocomplete="current-password" class="form-control py-2">
                                            </div>
                                            <div>
                                                <label
                                                    class="text-dark dark:text-darklink font-semibold mb-2 block ">New
                                                    Password</label>
                                                <input type="password" id="update_password_password" name="password" autocomplete="new-password" class="form-control py-2">
                                            </div>
                                            <div>
                                                <label
                                                    class="text-dark dark:text-darklink font-semibold mb-2 block ">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control py-2" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex gap-3 justify-end mt-6">
                        <button class="btn btn-md" type="submit">Save</button>
                        <button class="btn btn-light-error">Cancel</button>
                    </div>
                </form>
                </div>
                <!-- Security Tab end-->
            </div>
        </div>

    </div>
</div>
<!-- Main Content End -->


@endsection
