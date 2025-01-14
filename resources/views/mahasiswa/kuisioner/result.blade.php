@extends('layouts.mains')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Hasil Kuisioner</h1>
        <p>Hasil kuisioner untuk {{ $penilaian->dosen->nama_lengkap }}</p>
        <table class="w-full table-auto mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Pertanyaan</th>
                    <th class="px-4 py-2">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailPenilaian as $detail)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $detail->subkriteria->nama_subkriteria }}</td>
                        <td class="border px-4 py-2">{{ $detail->skalaPenilaian->kategori }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
