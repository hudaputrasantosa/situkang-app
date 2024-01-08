@extends('layouts.app')
@section('title', 'Situkang | Jenis Tukang')
@section('content')

    <section class="py-8 lg:py-24 px-2 flex items-center justify-center bg-gradient-to-r from-cyan-400 to-blue-500">
        <div class="mx-auto max-w-[43rem]">
            <div class="text-center">
                <h1 class="mt-3 text-2xl lg:text-5xl font-bold  text-white">Tentukan Spesialis Tukang sesuai dengan
                    kebutuhan.</h1>
                <p class="mt-3 ext-sm lg:text-lg leading-relaxed text-slate-100">Specify helps you unify your brand identity
                    by
                    collecting, storing and distributing design tokens and assets — automatically.</p>
            </div>
        </div>

    </section>
    <div class="container flex flex-col px-2 py-4 mb-10 lg:px-10 mx-auto">
        <h3 class="text-lg font-bold tracking-wide text-gray-800 lg:text-3xl my-6 lg:my-10 text-center">Pilih Jenis Tukang
        </h3>
        <div class="grid grid-cols-1 gap-x-[6px] gap-y-4 lg:grid-cols-4 lg:gap-x-6 lg:gap-y-4 mx-auto justify-center">
            @foreach ($keahlians as $keahlian)
                <div class="max-w-xs cursor-pointer rounded-lg bg-white p-3 lg:p-2 shadow border hover:shadow-md">
                    <img class="rounded-lg object-cover object-center w-full h-52" loading="lazy"
                        src="{{ asset('assets/img/jenis/'.$keahlian->foto) }}" alt="tukang" />
                    <div class="w-full justify-center text-center gap-2">
                        <div class="my-3 items-center justify-between">
                            <p class="text-sm lg:text-lg font-bold text-gray-600">{{ $keahlian->nama_keahlian }}</p>
                                <p class="text-xs lg:text-sm text-gray-500 text-justify px-2 my-1">
                                    {{ $keahlian->deskripsi }} </p>


                        </div>
                        <div class="w-full px-2 mb-2 mt-auto">
                            <a href="{{ route('jenis-tukang.keahlian', $keahlian->id) }}">
                                <button
                                    class="w-full mt-auto px-3 py-2 bg-blue-500 rounded-md text-sm font-semibold text-white">Lihat
                                    Detail</button>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
