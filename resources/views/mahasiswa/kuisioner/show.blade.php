{{-- @extends('layouts.mains')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Hasil Kuisioner untuk {{ $penilaian->dosen->nama_lengkap }}</h1>
        <h2 class="text-xl font-bold mb-2">Kritik: {{ $penilaian->kritiksaran->kritik }}</h2>
        <h2 class="text-xl font-bold mb-4">Saran: {{ $penilaian->kritiksaran->saran }}</h2>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Kriteria</th>
                    <th class="border px-4 py-2">Pertanyaan</th>
                    <th class="border px-4 py-2">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailPenilaian as $index => $detail)
                    @if ($loop->first || $detail->subkriteria->kriteria->nama_kriteria != $detailPenilaian[$index - 1]->subkriteria->kriteria->nama_kriteria)
                    <tr class="bg-gray-100">
                        <td colspan="4" class="border px-4 py-2 text-left font-semibold">{{ $detail->subkriteria->kriteria->nama_kriteria }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $detail->subkriteria->kriteria->nama_kriteria }}</td>
                        <td class="border px-4 py-2">{{ $detail->subkriteria->nama_subkriteria }}</td>
                        <td class="border px-4 py-2 text-center">{{ $detail->skalaPenilaian->kategori }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ url('kuisioner') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
@endsection --}}



 @extends('layouts.mains')

@section('content')

<!----Breadcrumb Start---->
<div class="pt-5">
    <div class="container full-container py-5 ">
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Halaman Riwayat Kuisioner Penilaian
                            Kinerja Dosen Universitas
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
                               Riwayat Penilaian Kinerja Dosen
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



        <div class="card  full-container py-5">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h3 class="font-semibold text-xl text-dark dark:text-white mb-3">  Dosen:
                            {{ $penilaian->dosen->nama_lengkap }}</h3>
                        <h3 class="font-semibold text-xl text-dark dark:text-white mb-3">  NIDN:
                            {{ $penilaian->dosen->nidn }}</h3>


                        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">

                    </div>
                    <div class="col-span-3 mb-10">
                        <div class="flex justify-left">
                            {{-- <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}"
                            class="md:-mb-7 -mb-4 h-full w-full" /> --}}
                        </div>
                    </div>
                </div>
            </div>
<div class="container">
        <table class="w-full table-auto mb-2">
            <thead class="bg-darkgray text-white">
                <tr>
                    <th class="px-4 py-2 ">No</th>
                    <th class="border px-4 py-2"  >Pertanyaan</th>
                    <th class="border px-4 py-2" >Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailPenilaian as $index => $detail)
                    @if ($loop->first || $detail->subkriteria->kriteria->nama_kriteria != $detailPenilaian[$index - 1]->subkriteria->kriteria->nama_kriteria)
                    <tr class="bg-gray-100">
                        <td colspan="4" class="border px-4 py-2 text-left font-semibold">{{ $detail->subkriteria->kriteria->nama_kriteria }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="border px-4 py-2 text-center p-2" width="10px">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 p-2 " width="400">{{ $detail->subkriteria->nama_subkriteria }}</td>
                        <td class="border px-4 py-2 text-center" width="340px">
                            @foreach ($skala as $sk)
                            <div class="inline-block">
                                <input type="radio" class="shrink-0 mt-0.5 form-check-input " value="{{ old('skala_id', $detail->skala_id) }}"  {{ $detail->skala_id == $sk->skala_id ? 'checked' : '' }} disabled >
                                <label class="text-sm text-gray-500  dark:text-gray-400">
                                    <span class="ml-2">{{ $sk->kategori }}</span>
                                </div>
                            </label>
                                @endforeach
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>




        <div class="contact-name">
                <h6 class="card-title mb-2">Kritik</h6>
                <textarea name="kritik" readonly
            cols="30" rows="5" class="form-control">{{ $penilaian->kritiksaran->kritik }}</textarea>
             <span class="validation-text text-error"></span>
        </div>


    <div class="contact-name mb-2">
        <h6 class="card-title mb-2">Saran</h6>
        <textarea name="saran" readonly  cols="30"
            rows="5" class="form-control">{{ $penilaian->kritiksaran->kritik }}</textarea>
        <span class="validation-text text-error"></span>
    </div>
        <div class="mt-6">
            <a href="{{ url('kuisioner') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>
        </div>
    </div>
@endsection





























{{-- @extends('layouts.mains')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Hasil Kuisioner untuk {{ $penilaian->dosen->nama_lengkap }}</h1>
        <h1 class="text-2xl font-bold mb-4">Kritik: {{ $penilaian->kritiksaran->kritik }}</h1>
        <h1 class="text-2xl font-bold mb-4">Saran: {{ $penilaian->kritiksaran->saran }}</h1>

        <form action="#" method="POST" class="bg-white p-4 rounded-lg shadow-md">
            @csrf
            <table class="w-full table-auto">
                <thead class="bg-darkgray text-white">
                    <tr>
                        <th class="px-4 py-2" width="20px">Nomor</th>
                        <th class="px-4 py-2" width="270px">Pertanyaan</th>
                        <th class="px-4 py-2" width="300px">Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $questionNumber = 1;
                    @endphp
                    @foreach($kriteria as $krit)
                    <tr>
                        <td colspan="3" class="bg-indigo-300 font-bold px-4 py-2 text-black">{{ $krit->nama_kriteria }}</td>
                    </tr>
                    @foreach($krit->subkriteria as $sub)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $questionNumber++ }}</td>
                        <td class="border px-4 py-2">{{ $sub->nama_subkriteria }}</td>
                        <td class="border px-4 py-2">
                            @foreach($skala as $s)
                                <div class="inline-block mr-4">
                                    <input type="radio" id="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}" name="jawaban[{{ $sub->subkriteria_id }}]" value="{{ $s->skala_id }}" class="shrink-0 mt-0.5 h-5 w-5 form-check-input"
                                    @if($detailPenilaian->where('subkriteria_id', $sub->subkriteria_id)->first()->skala_id == $s->skala_id) checked @endif disabled>
                                    <label for="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}" class="text-sm text-gray-500 ms-2 dark:text-gray-400">{{ $s->kategori }}</label>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>

            <a href="{{ url('kuisioner') }}" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Back</a>
        </form>
    </div>
@endsection --}}
