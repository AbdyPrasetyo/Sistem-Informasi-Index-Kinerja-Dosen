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
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Kuisioner Penilaian
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
                                Kuisioner Penilaian Kinerja Dosen
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


        <div class="card  full-container py-5">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3"> Kuisioner Penilaian Dosen
                            {{ $dosen->nama_lengkap }}</h4>
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

            <form action="{{ route('kuisioner.store') }}" method="POST" class="bg-white p-4 rounded-lg shadow-md">
                @csrf
                <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
                <input type="hidden" name="krs_id" value="{{ $krs->krs_id }}">
                <table class="w-full table-auto mb-2">
                    <thead class="bg-darkgray text-white">
                        <tr>
                            <th class="px-4 py-2 " width="10px">Nomor</th>
                            <th class="px-4 py-2" width="240px">Pertanyaan</th>
                            <th class="px-4 py-2" width="340px">Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $questionNumber = 1;
                        @endphp
                        @foreach($kriteria as $krit)
                        <tr>
                            <td colspan="3" class="bg-indigo-300 font-bold px-4 py-2 text-black">
                                {{ $krit->nama_kriteria }}</td>
                        </tr>
                        @foreach($krit->subkriteria as $sub)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $questionNumber++ }}</td>
                            <td class="border px-4 py-2">{{ $sub->nama_subkriteria }}</td>
                            <td class="border px-4 py-2">
                                @foreach($skala as $s)
                                <div class="inline-block mr-4 p-1">
                                    <input type="radio" id="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}"
                                        name="jawaban[{{ $sub->subkriteria_id }}]" value="{{ $s->skala_id }}"
                                        class="shrink-0 mt-0.5  h-5 w-5 form-check-input" required>
                                    <label for="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}"
                                        class="text-sm text-gray-500 ms-2 dark:text-gray-400">{{ $s->kategori }}</label>
                                </div>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>

                <div class="contact-name">
                    <h6 class="card-title mb-2">Kritik</h6>
                    <textarea name="kritik" required placeholder="Masukan Kritik Saudara/Saudari Terhadap Dosen"
                        cols="30" rows="5" class="form-control"></textarea>
                    <span class="validation-text text-error"></span>
                </div>


                <div class="contact-name mb-2">
                    <h6 class="card-title mb-2">Saran</h6>
                    <textarea name="saran" required placeholder="Masukan Saran Saudara/Saudari Terhadap Dosen" cols="30"
                        rows="5" class="form-control"></textarea>
                    <span class="validation-text text-error"></span>
                </div>
                <button type="submit"
                    class="btn-md text-sm font-medium rounded-md border border-transparent bg-primary hover:bg-primaryemphasis text-white ">Submit</button>
                <a href="{{ url('kuisioner') }}"
                    class="btn-md text-sm font-semibold rounded-md border border-transparent bg-lighterror text-erroremphasis hover:text-darkerror hover:bg-error dark:hover:bg-darkerror dark:text-error">Back</a>
            </form>
        </div>
        @endsection

        {{--
@extends('layouts.mains')
@section('content')
<div class="pt-5">
    <div class="container full-container py-5">
        <div
            class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
            <div class="card-body md:py-3 py-5">
                <div class="flex items-center grid grid-cols-12 gap-6">
                    <div class="col-span-9">
                        <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Form Kuisioner Penilaian Kinerja Dosen Universitas
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
        <li class="flex items-center text-sm text-link dark:text-darklink leading-none" aria-current="page">
            Kuisioner Penilaian Kinerja Dosen Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat atque,
            numquam delectus repudiandae magnam eaque illo velit voluptatum distinctio. Minus illo quaerat ullam
            corrupti autem praesentium, ex repudiandae in blanditiis aperiam iusto ipsum laboriosam repellat alias
            veniam facere dolor, dignissimos expedita excepturi unde pariatur temporibus iure? Fuga maxime assumenda
            pariatur nihil excepturi veniam aliquam tenetur nam possimus voluptas! Officia a magni dolorem mollitia nisi
            sit perspiciatis doloribus tenetur, dignissimos vel, possimus nobis! Inventore adipisci autem enim mollitia
            impedit commodi illum, ipsam rerum alias accusantium cum. Corrupti, necessitatibus architecto pariatur
            reprehenderit voluptate fugiat nisi eum! Dolore voluptas architecto nemo numquam labore dolorum. Repudiandae
            alias earum eligendi, unde magni accusamus quibusdam voluptas sit consequuntur cumque voluptatibus modi
            tenetur fugiat eum facere dolorem eaque cupiditate ipsam architecto voluptatem repellendus hic vel ab dicta.
            Tempora laborum sint ipsam temporibus odit earum adipisci nihil provident dignissimos iure quisquam corporis
            amet nulla dolore placeat, eius aspernatur itaque eligendi. Obcaecati dicta corporis ut, ex earum maxime
            aliquam temporibus natus illo ipsam eveniet consectetur eligendi ad iusto quisquam quia molestiae non autem
            nobis est recusandae. Consequuntur sint beatae modi et accusantium consequatur ratione amet harum numquam
            tempore! Tempora, architecto libero. Illum quas porro mollitia maiores rem quis sequi.
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





<div class="card mb-6 ">
    <div class="card-body">
        <div class="grid grid-cols-12 gap-6">
            <div class="lg:col-span-4 md:col-span-12 sm:col-span-12 col-span-12 ">
                <form class="relative max-w-64">
                    <input type="text" class="form-control product-search pl-11 py-2" id="input-search"
                        placeholder="Search Kriteria..." />
                    <i
                        class="ti ti-search absolute  start-3  text-bodytext dark:text-darklink text-xl translate-y-1/2 -top-2"></i>
                </form>
            </div>

        </div>

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <form action="{{ route('kuisioner.store') }}" method="POST"
                            class="bg-white p-4 rounded-lg shadow-md">
                            @csrf
                            <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
                            <input type="hidden" name="krs_id" value="{{ $krs->krs_id }}">
                            <table
                                class="table search-table min-w-full divide-y divide-border dark:divide-darkborder table-auto">
                                <thead>
                                    <tr>

                                        <th scope="col"
                                            class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                            No</th>
                                        <th scope="col"
                                            class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                            Pertanyaan Penilaian</th>
                                        <th scope="col"
                                            class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                            Jawaban</th>
                                        <th scope="col"
                                            class="text-left rtl:text-right  p-4 font-semibold text-dark dark:text-white text-sm">
                                            Action</th>


                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border dark:divide-darkborder">

                                    @php
                                    $questionNumber = 1;
                                    @endphp
                                    @foreach($kriteria as $krit)
                                    <tr class="search-items">
                                        <td
                                            class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                            {{ $krit->nama_kriteria }}
                                        </td>
                                    </tr>

                                    @foreach($krit->subkriteria as $sub)
                                    <tr>
                                        <td
                                            class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                            {{ $questionNumber++ }}
                                        </td>
                                        <td
                                            class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                            {{ $sub->nama_subkriteria }}
                                        </td>

                                        <td
                                            class="usr-ph-no text-sm whitespace-nowrap text-bodytext dark:text-darklink p-4">
                                            @foreach($skala as $s)
                                            <div class="inline-block mr-4">
                                                <input type="radio"
                                                    id="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}"
                                                    name="jawaban[{{ $sub->subkriteria_id }}]"
                                                    value="{{ $s->skala_id }}"
                                                    class="shrink-0 mt-0.5 h-5 w-5 form-check-input" required>
                                                <label for="subkriteria_{{ $sub->subkriteria_id }}_{{ $s->skala_id }}"
                                                    class="text-sm text-gray-500 ms-2 dark:text-gray-400">{{ $s->kategori }}</label>
                                            </div>
                                            @endforeach
                                        </td>

                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="contact-name">
                                <h6 class="card-title mb-2">Kritik</h6>
                                <textarea name="kritik" required
                                    placeholder="Masukan Kritik Saudara/Saudari Terhadap Dosen" cols="30" rows="5"
                                    class="form-control"></textarea>
                                <span class="validation-text text-error"></span>
                            </div>


                            <div class="contact-name">
                                <h6 class="card-title mb-2">Saran</h6>
                                <textarea name="saran" required
                                    placeholder="Masukan Saran Saudara/Saudari Terhadap Dosen" cols="30" rows="5"
                                    class="form-control"></textarea>
                                <span class="validation-text text-error"></span>
                            </div>
                            <button type="submit"
                                class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                            <a href="{{ url('kuisioner') }}"
                                class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Back</a>
                        </form>



                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection --}}
