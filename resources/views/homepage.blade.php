@extends('layouts.app')
@section('title', 'Situkang | Homepage')

@section('content')
    <div class="px-2 lg:px-10 ">

        <div
            class="container flex flex-col py-4 px-2 mt-2 mx-auto space-y-6 text-center lg:py-4 lg:text-left lg:px-10 lg:mt-14 lg:flex-row lg:items-center">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-xl">
                    <h1 class="text-2xl font-bold tracking-wide text-gray-800 lg:text-5xl">
                        Temukan tukang bangunan terbaik.
                    </h1>

                    <div class="mt-2 lg:mt-6 space-y-5">
                        <p class="items-center text-gray-70">
                            Cari tukang bangunan berdasarkan lokasi terdekat dan kesesuaian kebutuhan untuk proyek anda.
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


        <div class="container flex flex-col items-center mx-auto px-2 lg:px-10 my-8 lg:my-16">
            <h3 class="text-xl font-bold tracking-wide text-gray-800 lg:text-3xl mb-7 lg:mb-10">Cara Kerja Aplikasi
                SiTukang</h3>
            <div class="grid w-full grid-cols-2 gap-4 text-center lg:gap-10 md:grid-cols-2 lg:grid-cols-3">

                <div class="flex flex-col items-center gap-1 px-2 py-4 bg-white rounded-xl border-2 shadow-main">
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-blue-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
</svg>

                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-semibold text-dark-grey-900">Cari Bidang Keahlian</p>
                    <p class="lg:text-base text-xs text-dark-grey-400">Pilih bidang keahlian tukang bangunan sesuai kebutuhan</p>
                </div>
                <div class="flex flex-col items-center gap-1 px-2 py-4 bg-white rounded-xl border-2 shadow-main">
                    <span>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-blue-500">
  <path fill-rule="evenodd" d="M17.303 5.197A7.5 7.5 0 0 0 6.697 15.803a.75.75 0 0 1-1.061 1.061A9 9 0 1 1 21 10.5a.75.75 0 0 1-1.5 0c0-1.92-.732-3.839-2.197-5.303Zm-2.121 2.121a4.5 4.5 0 0 0-6.364 6.364.75.75 0 1 1-1.06 1.06A6 6 0 1 1 18 10.5a.75.75 0 0 1-1.5 0c0-1.153-.44-2.303-1.318-3.182Zm-3.634 1.314a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68Z" clip-rule="evenodd" />
</svg>

                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-semibold text-dark-grey-900">Seleksi Tukang Bangunan</p>
                    <p class="lg:text-base text-xs text-dark-grey-400">Pilih dan seleksi tukang bangunan berdasarkan kebutuhan</p>
                </div>

                <div
                    class="flex flex-col col-span-2 lg:col-span-1 items-center gap-2 px-4 py-5 bg-white rounded-xl border-2 shadow-main">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-blue-500">
  <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
  <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
</svg>

                    </span>
                    <p class="text-base font-semibold lg:text-2xl lg:font-semibold text-dark-grey-900">Ajukan Sewa</p>
                    <p class="lg:text-base text-xs text-dark-grey-400">Lengkapi formulir dan mengajukannya.</p>
                </div>

            </div>
        </div>

        <div class="container flex flex-col px-0 py-4 mb-10 lg:px-10 mx-auto">
            <h3 class="text-lg font-bold tracking-wide text-gray-800 lg:text-3xl mb-7 lg:mb-10 text-center">Temukan Tukang
            </h3>
            <div class="grid grid-cols-2 gap-x-2 gap-y-3 lg:grid-cols-4 lg:gap-x-6 lg:gap-y-4">
                @foreach ($tukangs as $tukang)
                    <div class="max-w-xs cursor-pointer rounded-lg bg-white p-1 lg:p-2 shadow border">
                        <img class="w-full rounded-lg object-cover object-center w-full lg:h-64 h-40" loading="lazy"
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

    </div>
@endsection
