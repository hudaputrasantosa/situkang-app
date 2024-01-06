@extends('layouts.app')
@section('title', 'Situkang | Tentang kami')

@section('content')
    <main>

        <div class="px-2 lg:px-10 ">

            <div
                class="container flex flex-col py-4 px-2 mt-2 mx-auto space-y-6 text-center lg:py-4 lg:text-left lg:px-10 lg:mt-14 lg:flex-row lg:items-center">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-xl">
                        <h2 class="text-2xl font-bold tracking-wide text-gray-800 lg:text-4xl">
                            SiTukang, Menjawab Kebutuhan
                            Pelanggan mencari tukang bangunan.
                            </h1>

                            <div class="mt-2 lg:mt-6 space-y-5">
                                <p class="items-center text-gray-70">
                                    Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                                    most popular front-end open source toolkit, featuring Sass variables and mixins,
                                    responsive
                                    grid
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
        </div>
    </main>
@endsection
