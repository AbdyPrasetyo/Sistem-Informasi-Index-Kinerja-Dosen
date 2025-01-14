

@extends('layouts.mains')
@section('content')

<div class="pt-5">
    <div class="container full-container py-5">
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Tambah Data KRS Mahasiswa
                        </h4>
                        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                            <li class="flex items-center">
                                <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                    href="{{ url('dashboard') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="p-0.5 rounded-full bg-dark dark:bg-darklink mx-2.5 flex items-center"></div>
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

        <div class="card mb-6">
            <div class="card-body">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <div class="col-span-12">
                                    <form action="{{ route('krs.create') }}" method="GET">
                                        @csrf
                                        <div class="relative mb-4">
                                            <select name="mahasiswa_id"
                                                class="  peer p-4 pe-9 form-control focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2">
                                                <option selected>Pilih Mahasiswa</option>
                                                @foreach($mahasiswa as $mhs)
                                                <option value="{{ $mhs->mahasiswa_id }}"
                                                    {{ isset($selectedMahasiswaId) && $selectedMahasiswaId == $mhs->mahasiswa_id ? 'selected' : '' }}>
                                                    [{{ $mhs->nim }}] {{ $mhs->nama_lengkap }}
                                                    [{{ $mhs->prodi->nama_prodi }}]
                                                </option>
                                                @endforeach
                                            </select>


                                            <label for="form_InputSelect3"
                                                class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-1.5 peer-[:not(:placeholder-shown)]:text-gray-500">Mahasiswa</label>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Tampilkan KRS</button>
                                    </form>

                                    @if(isset($selectedMahasiswaId))
                                    <form action="{{ route('krs.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="mahasiswa_id" value="{{ $selectedMahasiswaId }}">

                                        <table
                                            class="min-w-full bg-white border border-gray-200 divide-y divide-border dark:divide-darkborder mt-4">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Kode Matakuliah</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Nama Matakuliah</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Dosen</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        SKS</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Semester</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Fakultas</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Prodi</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Tahun Ajaran</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-semibold text-dark dark:text-white">
                                                        Pilih</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-border dark:divide-darkborder">
                                                @foreach($kelas as $ks)
                                                <tr class="bg-white">
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->matkul->kode_matakuliah }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->matkul->nama_matakuliah }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->dosen->nama_lengkap }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->matkul->sks }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        @if ($ks->matkul->semester == 1)
                                                        I
                                                        @elseif ($ks->matkul->semester == 2)
                                                        II
                                                        @elseif ($ks->matkul->semester == 3)
                                                        III
                                                        @elseif ($ks->matkul->semester == 4)
                                                        IV
                                                        @elseif ($ks->matkul->semester == 5)
                                                        V
                                                        @elseif ($ks->matkul->semester == 6)
                                                        VI
                                                        @elseif ($ks->matkul->semester == 7)
                                                        VII
                                                        @elseif ($ks->matkul->semester == 8)
                                                        VIII
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->matkul->prodi->fakultas->nama_fakultas }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->matkul->prodi->nama_prodi }}</td>
                                                    <td
                                                        class="px-4 py-2 text-sm text-bodytext dark:text-darklink border">
                                                        {{ $ks->tahun_ajaran }}</td>
                                                    <td class="px-4 py-2 text-center border">
                                                        <input type="checkbox" name="kelas_id[]"
                                                            value="{{ $ks->kelas_id }}"
                                                            class="form-check-input rounded-sm contact-chkbox"
                                                            {{ in_array($ks->kelas_id, $krs) ? 'checked disabled' : '' }}>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="flex gap-3 justify-start mt-6">
                                            <button class="btn btn-md" type="submit">Simpan</button>
                                            <a class="btn btn-light-error" href="{{ url('krs') }}">Batal</a>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    @endsection
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
