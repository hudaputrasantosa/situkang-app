@extends('layouts.app')
@section('title', 'Situkang | ' . $tukang->nama)

@section('content')
    {{-- <div class="px-4 py-2 my-4 text-center">
        <img class="aspect-ratio-object-cover rounded mb-3 border"
            src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif"
            alt="" width="200">
        <h2 class="display-6 fw-bold">{{ $tukang->nama }}</h2>
        <p class="mb-1 fs-5 fw-bolder">{{ $tukang->nama_keahlian }}</p>
        <p class="mb-3 mt-0 fs-6" style="font-size: 10pt;">
            <i class="bi bi-geo-alt-fill">
            </i>
            {{ ucwords(strtolower($kecamatan->name)) }}, {{ ucwords(strtolower($desa->name)) }}
        </p>
        <div class="col-lg-8 card border-left-primary shadow h-100 py-5 mx-auto">
            <div class="text-start px-5">
                <h5>Deskripsi</h5>
                @if ($tukang->deskripsi == null)
                    <p>Deskripsi tukang belum tersedia</p>
                @else
                    <p class="mb-4">{!! $tukang->deskripsi !!}</p>
                @endif
            </div>
            <div class="col-md-12 text-start mb-5 px-5">
                <h5>Pengalaman</h5>
                @if (count($pengalaman) === 0)
                    <p>Belum mempunyai pengalaman</p>
                @else
                    <div class="py-1">
                        <div class="card-body">
                            <div class="row text-start no-gutters align-items-center">
                                <div class="col-auto">
                                    <img src="{{ url('storage/tukang/pengalaman/' . $pengalaman->foto) }}" class="rounded"
                                        width="120px" alt="">
                                </div>
                                <div class="col mx-1">
                                    <div class="h6 mb-0 fw-bold text-gray-800">{{ $pengalaman->nama_proyek }}</div>
                                    <div class="text-xs font-weight-bold text-gray-500 mb-1">
                                        {{ $pengalaman->alamat }}
                                    </div>
                                    <div class="text-xs fw-semibold text-gray mb-1" style="font-size: 10.5pt;">
                                        <i class="bi bi-calendar-date" style="margin-right: 2px;"></i>
                                        {{ $pengalaman->tanggal_mulai }} Sampai {{ $pengalaman->tanggal_selesai }} <i
                                            class="bi bi-briefcase-fill" style="margin: 0px 2px 0px 10px;"></i>
                                        {{ $pengalaman->nama_keahlian }}
                                    </div>
                                    <div class="text-gray mb-1" style="font-size: 10pt;">
                                        {{ $pengalaman->deskripsi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a type="button" class="btn btn-primary col-4 btn-lg text-md mx-auto"
                    @if (Auth::check()) data-bs-toggle="modal" data-bs-target="#sewa" @else href="{{ route('auth.login') }}" @endif>Ajukan
                    Sewa Rp. {{ $tukang->harga }}</a>
            </div>

        </div>
    </div> --}}

    <div class="w-full h-full ">
        <img src="{{ asset('assets/img/profile-background.jpg') }}" loading="lazy"
            class="lg:object-none object-cover w-full h-24 lg:object-cover lg:h-60">
    </div>
    <div class="bg-gray-100 px-2 lg:px-24">

        <div class="bg-none pb-4">
            <div class="flex flex-col items-center -mt-14 lg:-mt-20">
                <img src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else {{ asset('assets/img/user.jpg') }} @endif"
                    loading="lazy" class="object-cover w-40 h-40 object-center border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{ $tukang->nama }}</p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </div>
                <p class="text-gray-700">{{ $tukang->nama_keahlian }}</p>
                <div class="flex">
                    <i class="bi bi-geo-alt-fill text-gray-600 mr-1"></i>
                    <p class="text-sm text-gray-500"> {{ ucwords(strtolower($kecamatan->name)) }},
                        {{ ucwords(strtolower($desa->name)) }}</p>
                </div>
                <p class="text-lg font-semibold mt-1">Harga Sewa Rp. {{ $tukang->harga }}</p>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-center justify-center px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">

                    <a class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 font-semibold px-6 py-2 hover:cursor-pointer rounded text-sm space-x-2 transition duration-100"
                        @if (Auth::check()) data-modal-target="sewa" data-modal-toggle="sewa" @else href="{{ route('auth.login') }}" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Ajukan Sewa</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4 lg:mx-12">
            <div class="w-full flex flex-col 2xl:w-1/3">

                <div class="flex-1 bg-white rounded-lg shadow-xl lg:p-12 p-6">
                    <h4 class="text-xl text-gray-900 font-bold">Tentang</h4>
                    <p class="mt-2 text-gray-600 text-xs lg:text-base">
                        @if ($tukang->deskripsi == null)
                            Deskripsi tukang belum tersedia
                        @else
                            {!! $tukang->deskripsi !!}
                        @endif
                    </p>
                </div>

                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 lg:p-12 p-6">
                    <h4 class="text-xl text-gray-900 font-bold">Pengalaman</h4>

                    {{-- <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div> --}}
                    @if (count($pengalamans) === 0)
                        <p class="text-base mt-3 tex-gray-600">Belum mempunyai pengalaman</p>
                    @else
                        @foreach ($pengalamans as $pengalaman)
                            <div class="flex lg:flex-row flex-col lg:items-center justify-start w-full my-6 gap-x-6">
                                <div class="mb-1">
                                    <img src="{{ url('storage/tukang/pengalaman/' . $pengalaman->foto) }}"
                                        class="object-cover lg:w-60 w-full lg:max-h-32 max-h-40 rounded-lg" loading="lazy"
                                        alt="pengalaman">
                                </div>
                                <div class="w-full flex flex-col gap-[2px]">
                                    <h5 class="lg:text-lg text-base font-semibold text-gray-800">
                                        {{ $pengalaman->nama_proyek }}
                                    </h5>
                                    <div class="flex flex-row items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>


                                        <p class="text-sm text-gray-500 font-normal">{{ $pengalaman->alamat }}</p>
                                    </div>
                                    <div class="flex flex-row items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                        <p class="text-sm text-gray-600 font-medium">{{ $pengalaman->tanggal_selesai }} s/d
                                            {{ $pengalaman->tanggal_selesai }}</p>

                                    </div>
                                    <div class="my-1">
                                        <p class="text-sm text-gray-500 font-normal mt-auto text-justify">
                                            {{ $pengalaman->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 lg:p-12 p-6">
                    <h4 class="text-xl text-gray-900 font-bold">Ulasan</h4>
                    <div class="px-4">
                        {{-- <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div> --}}

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 ">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pengjuan sewa modal -->
    <div id="sewa" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden static fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Form pengajuan sewa
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="sewa">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('pelanggan.sewa') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <input type="hidden" name="tukangs_id" value="{{ $tukang->id }}">
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Sewa</label>

                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text"
                                    name="tanggal_sewa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="Select date">
                            </div>

                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="tipe_sewa" class="block mb-2 text-sm font-medium text-gray-900">Tipe Sewa</label>
                            <select id="tipe_sewa" name="tipe_sewa"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Pilih Tipe Sewa ...</option>
                                <option value="harian">Harian</option>
                                <option value="borongan tenaga">Borongan Tenaga</option>
                                <option value="borongan penuh">Borongan Penuh</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tipe_bangunan" class="block mb-2 text-sm font-medium text-gray-900">Tipe
                                Bangunan</label>
                            <select id="tipe_bangunan" name="tipe_bangunan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Pilih Tipe Bangunan ...</option>
                                <option value="rumah">Rumah</option>
                                <option value="kos">Kos</option>
                                <option value="ruko/kios">Ruko/Kios</option>
                                <option value="restorant/cafe">Restorant/Cafe</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tipe_pengerjaan" class="block mb-2 text-sm font-medium text-gray-900">Tipe
                                Pengerjaan</label>
                            <select id="tipe_pengerjaan" name="tipe_pengerjaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Pilih Tipe Pengerjaan ...</option>
                                <option value="pembangunan">Pembangunan</option>
                                <option value="perbaikan">Perbaikan</option>
                                <option value="renovasi">Renovasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tipe_pembayaran" class="block mb-2 text-sm font-medium text-gray-900">Tipe
                                Sewa</label>
                            <select id="tipe_pembayaran" name="tipe_pembayaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Pilih tipe pembayaran ...</option>
                                <option value="bayar di tempat">Bayar di tempat</option>
                                <option value="bank">Bank</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                                Deskripsi Pengajuan Sewa</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Tulis tentang kebutuhan sewa tukang.."></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white w-full  inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center justify-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Ajukan Sewa Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
