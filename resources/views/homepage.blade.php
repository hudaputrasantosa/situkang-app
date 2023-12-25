@extends('layouts.app')
@section('title', 'Situkang | Homepage')
{{--
@section('head-section')
    @vite('resources/js/app.js')
@endsection --}}

@section('content')
    <div class="px-2 lg:px-10 ">

        <div
            class="container flex flex-col py-4 px-2 mt-2 mx-auto space-y-6 text-center lg:py-4 lg:text-left lg:px-10 lg:mt-14 lg:flex-row lg:items-center">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-xl">
                    <h1 class="text-2xl font-bold tracking-wide text-gray-800 lg:text-5xl">
                        Temukan jenis tukang bangunan sesuai kebutuhan anda.
                    </h1>

                    <div class="mt-2 lg:mt-6 space-y-5">
                        <p class="items-center text-gray-70">
                            Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                            most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                            system, extensive prebuilt components.
                        </p>
                    </div>
                </div>

                <div class="flex mt-8 mb-4 justify-center lg:justify-start">
                    <a href="{{ route('jenis-tukang') }}"
                        class="flex px-16 lg:px-4 py-3 text-white font-semibold transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 pr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>

                        <span>Cari Tukang Spesialis</span>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-center w-full lg:w-1/2">
                <img class="object-cover w-full h-[70%] lg:h-full mx-auto rounded-md lg:max-w-2xl"
                    src="{{ asset('assets/img/beranda/hero-beranda.jpg') }}" alt="glasses photo">
            </div>
        </div>
        {{-- <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://img.freepik.com/free-photo/civil-engineer-construction-worker-architects-wearing-hardhats-safety-vests-are-working-together-construction-site-building-home-cooperation-teamwork-concept_640221-172.jpg?w=740&t=st=1695739276~exp=1695739876~hmac=ee72b6df4c1e90f9731015762bb1397a9420fde5c69f6ebafd8f04d95d1bf36f"
                        class="d-block mx-lg-auto img-fluid rounded" width="600" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="text-xl font-bold text-blue-500">Temukan jenis tukang bangunan sesuai kebutuhan anda.</h2>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                        most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                        system, extensive prebuilt components.</p>
                </div>
            </div>
        </div> --}}


        <div class="container flex flex-col items-center mx-auto px-2 lg:px-10 my-8 lg:my-16">
            <h3 class="text-xl font-bold tracking-wide text-gray-800 lg:text-3xl mb-7 lg:mb-10">Cara Kerja Aplikasi
                SiTukang</h3>
            <div class="grid w-full grid-cols-2 gap-4 text-center lg:gap-10 md:grid-cols-2 lg:grid-cols-3">

                <div class="flex flex-col items-center gap-1 px-2 py-4 bg-white rounded-xl border-2 shadow-main">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                            fill="none">
                            <path
                                d="M31.9904 13.965L22.4166 4.40166C21.6057 3.60976 20.5294 3.16817 19.4104 3.16817C18.2914 3.16817 17.2151 3.60976 16.4041 4.40166L6.8304 13.9017C6.40502 14.283 6.0629 14.7524 5.82645 15.279C5.58999 15.8056 5.46454 16.3776 5.45831 16.9575V30.5425C5.47456 31.6946 5.93476 32.793 6.73808 33.5973C7.5414 34.4016 8.62236 34.846 9.74415 34.8333H28.9225C30.0443 34.846 31.1252 34.4016 31.9285 33.5973C32.7319 32.793 33.1921 31.6946 33.2083 30.5425V16.9575C33.2071 16.4009 33.0989 15.85 32.8899 15.3365C32.6809 14.823 32.3752 14.3569 31.9904 13.965ZM18.47 6.68166C18.7058 6.46025 19.0138 6.33747 19.3333 6.33747C19.6528 6.33747 19.9608 6.46025 20.1966 6.68166L28.5833 15.0417L20.1504 23.4017C19.9146 23.6231 19.6066 23.7459 19.2871 23.7459C18.9675 23.7459 18.6596 23.6231 18.4237 23.4017L10.0833 15.0417L18.47 6.68166ZM30.125 30.5425C30.1052 30.8533 29.9688 31.144 29.7445 31.3537C29.5203 31.5633 29.2256 31.6755 28.9225 31.6667H9.74415C9.44102 31.6755 9.14636 31.5633 8.9221 31.3537C8.69785 31.144 8.56147 30.8533 8.54165 30.5425V17.9708L14.7854 24.1458L12.2262 26.6792C11.9391 26.9758 11.7779 27.3771 11.7779 27.7954C11.7779 28.2137 11.9391 28.615 12.2262 28.9117C12.3695 29.066 12.5417 29.1891 12.7324 29.2734C12.9232 29.3578 13.1286 29.4017 13.3362 29.4025C13.7332 29.4009 14.1142 29.2421 14.4 28.9592L17.1287 26.2675C17.8065 26.6928 18.5853 26.9179 19.3796 26.9179C20.1738 26.9179 20.9527 26.6928 21.6304 26.2675L24.3591 28.9592C24.6449 29.2421 25.026 29.4009 25.4229 29.4025C25.6306 29.4017 25.8359 29.3578 26.0267 29.2734C26.2174 29.1891 26.3896 29.066 26.5329 28.9117C26.82 28.615 26.9812 28.2137 26.9812 27.7954C26.9812 27.3771 26.82 26.9758 26.5329 26.6792L23.9583 24.1458L30.125 17.9708V30.5425Z"
                                fill="#581ff8" />
                        </svg>
                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-bold text-dark-grey-900">Email</p>
                    <p class="text-sm text-dark-grey-600">Paragraph of text beneath the heading to explain the
                        heading.</p>
                </div>
                <div class="flex flex-col items-center gap-1 px-2 py-4 bg-white rounded-xl border-2 shadow-main">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                            fill="none">
                            <path
                                d="M31.9904 13.965L22.4166 4.40166C21.6057 3.60976 20.5294 3.16817 19.4104 3.16817C18.2914 3.16817 17.2151 3.60976 16.4041 4.40166L6.8304 13.9017C6.40502 14.283 6.0629 14.7524 5.82645 15.279C5.58999 15.8056 5.46454 16.3776 5.45831 16.9575V30.5425C5.47456 31.6946 5.93476 32.793 6.73808 33.5973C7.5414 34.4016 8.62236 34.846 9.74415 34.8333H28.9225C30.0443 34.846 31.1252 34.4016 31.9285 33.5973C32.7319 32.793 33.1921 31.6946 33.2083 30.5425V16.9575C33.2071 16.4009 33.0989 15.85 32.8899 15.3365C32.6809 14.823 32.3752 14.3569 31.9904 13.965ZM18.47 6.68166C18.7058 6.46025 19.0138 6.33747 19.3333 6.33747C19.6528 6.33747 19.9608 6.46025 20.1966 6.68166L28.5833 15.0417L20.1504 23.4017C19.9146 23.6231 19.6066 23.7459 19.2871 23.7459C18.9675 23.7459 18.6596 23.6231 18.4237 23.4017L10.0833 15.0417L18.47 6.68166ZM30.125 30.5425C30.1052 30.8533 29.9688 31.144 29.7445 31.3537C29.5203 31.5633 29.2256 31.6755 28.9225 31.6667H9.74415C9.44102 31.6755 9.14636 31.5633 8.9221 31.3537C8.69785 31.144 8.56147 30.8533 8.54165 30.5425V17.9708L14.7854 24.1458L12.2262 26.6792C11.9391 26.9758 11.7779 27.3771 11.7779 27.7954C11.7779 28.2137 11.9391 28.615 12.2262 28.9117C12.3695 29.066 12.5417 29.1891 12.7324 29.2734C12.9232 29.3578 13.1286 29.4017 13.3362 29.4025C13.7332 29.4009 14.1142 29.2421 14.4 28.9592L17.1287 26.2675C17.8065 26.6928 18.5853 26.9179 19.3796 26.9179C20.1738 26.9179 20.9527 26.6928 21.6304 26.2675L24.3591 28.9592C24.6449 29.2421 25.026 29.4009 25.4229 29.4025C25.6306 29.4017 25.8359 29.3578 26.0267 29.2734C26.2174 29.1891 26.3896 29.066 26.5329 28.9117C26.82 28.615 26.9812 28.2137 26.9812 27.7954C26.9812 27.3771 26.82 26.9758 26.5329 26.6792L23.9583 24.1458L30.125 17.9708V30.5425Z"
                                fill="#581ff8" />
                        </svg>
                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-bold text-dark-grey-900">Email</p>
                    <p class="text-sm text-dark-grey-600">Paragraph of text beneath the heading to explain the
                        heading.</p>
                </div>

                <div
                    class="flex flex-col col-span-2 lg:col-span-1 items-center gap-2 px-4 py-5 bg-white rounded-xl border-2 shadow-main">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                            fill="none">
                            <path
                                d="M31.9904 13.965L22.4166 4.40166C21.6057 3.60976 20.5294 3.16817 19.4104 3.16817C18.2914 3.16817 17.2151 3.60976 16.4041 4.40166L6.8304 13.9017C6.40502 14.283 6.0629 14.7524 5.82645 15.279C5.58999 15.8056 5.46454 16.3776 5.45831 16.9575V30.5425C5.47456 31.6946 5.93476 32.793 6.73808 33.5973C7.5414 34.4016 8.62236 34.846 9.74415 34.8333H28.9225C30.0443 34.846 31.1252 34.4016 31.9285 33.5973C32.7319 32.793 33.1921 31.6946 33.2083 30.5425V16.9575C33.2071 16.4009 33.0989 15.85 32.8899 15.3365C32.6809 14.823 32.3752 14.3569 31.9904 13.965ZM18.47 6.68166C18.7058 6.46025 19.0138 6.33747 19.3333 6.33747C19.6528 6.33747 19.9608 6.46025 20.1966 6.68166L28.5833 15.0417L20.1504 23.4017C19.9146 23.6231 19.6066 23.7459 19.2871 23.7459C18.9675 23.7459 18.6596 23.6231 18.4237 23.4017L10.0833 15.0417L18.47 6.68166ZM30.125 30.5425C30.1052 30.8533 29.9688 31.144 29.7445 31.3537C29.5203 31.5633 29.2256 31.6755 28.9225 31.6667H9.74415C9.44102 31.6755 9.14636 31.5633 8.9221 31.3537C8.69785 31.144 8.56147 30.8533 8.54165 30.5425V17.9708L14.7854 24.1458L12.2262 26.6792C11.9391 26.9758 11.7779 27.3771 11.7779 27.7954C11.7779 28.2137 11.9391 28.615 12.2262 28.9117C12.3695 29.066 12.5417 29.1891 12.7324 29.2734C12.9232 29.3578 13.1286 29.4017 13.3362 29.4025C13.7332 29.4009 14.1142 29.2421 14.4 28.9592L17.1287 26.2675C17.8065 26.6928 18.5853 26.9179 19.3796 26.9179C20.1738 26.9179 20.9527 26.6928 21.6304 26.2675L24.3591 28.9592C24.6449 29.2421 25.026 29.4009 25.4229 29.4025C25.6306 29.4017 25.8359 29.3578 26.0267 29.2734C26.2174 29.1891 26.3896 29.066 26.5329 28.9117C26.82 28.615 26.9812 28.2137 26.9812 27.7954C26.9812 27.3771 26.82 26.9758 26.5329 26.6792L23.9583 24.1458L30.125 17.9708V30.5425Z"
                                fill="#581ff8" />
                        </svg>
                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-bold text-dark-grey-900">Email</p>
                    <p class="text-sm text-dark-grey-600">Paragraph of text beneath the heading to explain the
                        heading.</p>
                </div>

            </div>
        </div>

        <div class="container flex flex-col px-2 py-4 mb-10 lg:px-10 mx-auto">
            <h3 class="text-lg font-bold tracking-wide text-gray-800 lg:text-3xl mb-7 lg:mb-10 text-center">Temukan Tukang
            </h3>
            <div class="grid grid-cols-2 gap-x-[6px] gap-y-2 lg:grid-cols-4 lg:gap-x-6 lg:gap-y-4">
                @foreach ($tukangs as $tukang)
                    <div
                        class="max-w-xs cursor-pointer rounded-lg bg-white p-1 lg:p-2 shadow border duration-150 lg:hover:scale-105 hover:shadow-md">
                        <img class="w-full rounded-lg object-cover object-center"
                            src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else {{ asset('assets/img/user.jpg') }} @endif"
                            alt="tukang" />
                        <div class="w-full mx-auto text-center gap-2">
                            <div class="my-3 items-center justify-between">
                                <p class="text-sm lg:text-lg font-bold text-gray-600">{{ $tukang->nama }}</p>
                                <div class="flex text-center items-center justify-center">
                                    <i class="bi bi-geo-alt-fill text-gray-600 mr-0 lg:mr-1">
                                    </i>
                                    @php
                                        $kecamatan = Laravolt\Indonesia\Models\District::where('id', $tukang->kecamatan)->first();
                                        $desa = Laravolt\Indonesia\Models\Village::where('id', $tukang->desa)->first();
                                    @endphp
                                    <p class="text-xs lg:text-sm text-gray-500">
                                        {{ ucwords(strtolower($kecamatan->name)) }},
                                        {{ ucwords(strtolower($desa->name)) }}</p>
                                </div>
                                <div class="gap-6">
                                    <p class="text-sm lg:text-base font-medium text-gray-600 my-1">
                                        {{ $tukang->nama_keahlian }}</p>
                                    <p class="text-base lg:text-xl font-bold text-gray-600">Rp. {{ $tukang->harga }}
                                        <span class="text-sm">/ Hari</span>
                                    </p>
                                </div>
                            </div>
                            <div class="w-full mb-2 px-2 bottom-0">
                                <a href="{{ route('tukang.portofolio', $tukang->id) }}">
                                    <button
                                        class="w-full mx-auto px-3 py-2 bg-blue-500 rounded-md text-sm font-semibold text-white">Lihat
                                        Detail</button>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="album py-3 bg-light">
        <div class="py-2 col-5 mb-4 mx-auto text-center">
            {{-- <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Cari Tukang.." aria-describedby="inputGroup-sizing-default"> --}}
        {{-- <h4 class="mt-5">Tukang Terdekat</h4>
    </div>
    <div class="container col-md-12">


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 gap-2">
            @foreach ($tukangs as $tukang)
                <div class="card m-2" style="width: 16rem;">
                    <a href="{{ route('tukang.portofolio', $tukang->id) }}" class="text-decoration-none text-body">
                        <div class="img-thumbnail aspect-ratio aspect-ratio-1x1 mt-1">
                            <img src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif"
                                class="card-img-top aspect-ratio-object-cover"
                                style="object-fit: cover; object-position: center;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $tukang->nama }}</h5>
                            <div class="row d-flex align-items-center">

                                <p class="mb-0" style="font-size: 10pt;">
                                    <i class="bi bi-geo-alt-fill">
                                    </i>
                                    @php
                                        $kecamatan = Laravolt\Indonesia\Models\District::where('id', $tukang->kecamatan)->first();
                                        $desa = Laravolt\Indonesia\Models\Village::where('id', $tukang->desa)->first();
                                    @endphp

                                    {{ ucwords(strtolower($kecamatan->name)) }},
                                    {{ ucwords(strtolower($desa->name)) }}
                                </p>
                            </div>
                            <div class="mb-0">
                                <p>{{ $tukang->nama_keahlian }}</p>
                                <p class="fs-5">Rp {{ $tukang->harga }} /Hari</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
    </div>  --}}
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
