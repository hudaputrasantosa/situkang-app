@extends('layouts.apps')
@section('title', 'Situkang | Masuk Tukang')
@section('content')
    <!-- component -->
    <div class="bg-white flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-full hidden lg:block">
            <div class="object-cover w-full h-full"
                style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://img.freepik.com/free-photo/civil-engineer-construction-worker-manager-holding-digital-tablet-blueprints-talking-planing-about-construction-site-cooperation-teamwork-concept_640221-298.jpg?w=740&t=st=1703960442~exp=1703961042~hmac=bf3da73757d4bf491442fe27aa9bff54b8c76914781fedc529dcb4965ce73b87'), no-repeat; background-size: cover; background-position: center center;">
            </div>
        </div>
        <!-- Right: Login Form -->
        <div class="lg:px-32 p-6 w-full lg:w-1/2">
            <a href="{{ route('homepage') }}" class="mb-6 text-blue-500 font-semibold">
                < Kembali</a>
                    <h1 class="text-2xl font-semibold mb-4 text-center">Masuk sebagai Tukang</h1>
                    <form method="POST" action="{{ route('tukang.authenticate') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block text-gray-600">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror"
                                autocomplete="off" placeholder="Masukkan email.." required>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
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
                            class="disabled:opacity-75 flex gap-2 items-center justify-center text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full"
                            disabled>Masuk
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                        </button>

                    </form>
                    <!-- Sign up  Link -->
                    <div class="w-full my-5">
                        <a href="{{ route('tukang.register') }}">
                            <button
                                class=" w-full rounded-md bg-none py-2 px-4 w-full border-[1px] hover:cursor-pointer border-blue-500 text-blue-500 text-center lg:text-base text-sm font-medium">
                                Jika belum punya akun, Daftar disini</a>
                        </button>
                    </div>
                    <hr>
                    <p class="text-base text-gray-500 font-medium my-4">Jika sebagai Pelanggan,
                        <a href="{{ route('auth.login') }}" class="text-blue-500 underline underline-offset-2">Masuk
                            disini</a>
                    </p>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#email, #password').on('input', function() {
                let username = $('#email').val();
                let password = $('#password').val();

                if (username.trim() != '' && password.trim() != '') {
                    $('#submit').prop('disabled', false);
                    $('#submit').removeClass("disabled:opacity-75");
                } else {
                    $('#submit').prop('disabled', true);
                    $('#submit').addClass("disabled:opacity-75");
                }
            })
        })
    </script>
@endsection
