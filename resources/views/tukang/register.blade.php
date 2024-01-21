@extends('layouts.apps')
@section('title', 'Situkang | Daftar Tukang')

@section('content')
    <div class="bg-white flex flex-row justify-center h-full">
        <!-- Left: Image -->
        <div class="w-1/2 h-full hidden lg:block sticky top-0">
            <div class="object-cover w-full h-screen"
                style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://img.freepik.com/free-photo/civil-engineer-construction-worker-manager-holding-digital-tablet-blueprints-talking-planing-about-construction-site-cooperation-teamwork-concept_640221-298.jpg?w=740&t=st=1703960442~exp=1703961042~hmac=bf3da73757d4bf491442fe27aa9bff54b8c76914781fedc529dcb4965ce73b87'), no-repeat; background-size: cover; background-position: center center;">
            </div>
        </div>
        <!-- Right: Register Form -->
        <div class="lg:px-32 p-10 lg:my-6 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Tukang</h1>
            <form method="POST" action="{{ route('tukang.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-gray-600">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama"
                        class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('nama') invalid:border-red-500 @enderror"
                        autocomplete="off" required>
                    @error('nama')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-x-4">
                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-gray-600">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('tempat_lahir') invalid:border-red-500 @enderror"
                            autocomplete="off" required>
                        @error('tempat_lahir')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-gray-600">Tanggal Lahir</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text"
                                name="tanggal_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pilih tanggal" required>
                        </div>
                        @error('tanggal_lahir')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kecamatan" class="block text-gray-600">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option>Pilih Kecamatan ...</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id ?? '' }}">
                                    {{ ucwords(strtolower($kecamatan->name)) ?? '' }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="desa" class="block text-gray-600">Desa</label>
                        <select id="desa" name="desa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option>Pilih Desa ...</option>
                        </select>
                        @error('desa')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keahlians_id" class="block text-gray-600">Keahlian/Spesialis</label>
                        <select id="keahlians_id" name="keahlians_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option>Pilih Keahlian ..</option>
                            @foreach ($keahlians as $keahlian)
                                <option value="{{ $keahlian->id }}">{{ $keahlian->nama_keahlian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="no_telepon" class="block text-gray-600">No Telepon</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                    <path
                                        d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                </svg>
                            </div>
                            <input type="text" id="no_telepon" name="no_telepon"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                placeholder="6285-156-xxx-xxx" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-gray-600">Harga Harian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>

                            </div>
                            <input type="number" id="harga" name="harga" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-12 p-2.5"
                                required>
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <span class="font-semibold text-sm text-gray-600">/ Hari</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full  py-2 px-3 @error('email') invalid:border-red-500 @enderror"
                        placeholder="tukang@gmail.com" autocomplete="off" required>
                    @error('email')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="relative mb-6" x-data="{ show: true }">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input :type="show ? 'password' : 'text'" type="password" id="password" name="password"
                        class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror"
                        autocomplete="off" placeholder="Masukkan password.." required>

                    <div class="absolute top-9 right-4 cursor-pointer text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 block" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="flex flex-row gap-1 items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                        <p id="helper-text-explanation" class="text-sm text-blue-500 dark:text-gray-400">
                            Gabungan
                            huruf dan angka serta minimal 8 karakter.
                        </p>
                    </div>

                </div>



                <button type="submit" id="submit"
                    class="flex gap-2 items-center justify-center text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Daftar
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>

                </button>

            </form>
            <!-- Sign up  Link -->
            <div class="w-full my-5">
                <a href="{{ route('tukang.login') }}">
                    <button
                        class=" w-full rounded-md bg-none py-2 px-4 w-full border-[1px] hover:cursor-pointer border-blue-500 text-blue-500 text-center lg:text-base text-sm font-medium">
                        Jika sudah punya akun, Masuk disini</a>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#kecamatan').on('change', function() {
                let id = $(this).val();

                $.ajax({
                    url: '{{ route('tukang.getDesa') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#desa').empty();
                        $('#desa').append('<option>Pilih Desa ...</option>');
                        $.each(data, function(name, id) {
                            $('#desa').append(
                                `<option value="${id}">${name.charAt(0).toUpperCase() + name.slice(1).toLowerCase()}</option>`
                            );
                        });
                    },
                    error: function(request, status, error) {
                        alert(request.statusText + "[" + request.status + "]");
                        alert(request.responseText);
                        $('#desa').empty().append('<option value="">Pilih Desa ...</option>');
                    }
                });
            });

            $('#harga').on('keydown', function(event) {
                if (event.key === "," || event.key === "." || event.key === "-") {
                    event.preventDefault();
                }
            });

            $('#harga').mask('000.000.000');

        })
    </script>
@endsection
