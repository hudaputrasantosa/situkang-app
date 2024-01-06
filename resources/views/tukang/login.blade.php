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
            <h1 class="text-2xl font-semibold mb-4 text-center">Masuk sebagai Tukang</h1>
            <form method="POST" action="{{ route('tukang.authenticate') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-600">No Telepon</label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror"
                        autocomplete="off" placeholder="Masukkan no telepon.." required>
                             @error('email')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 bg-gray-50 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror"
                        autocomplete="off" placeholder="Masukkan password.." required>
                             @error('password')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                <a href="{{ route('auth.login') }}" class="text-blue-500 underline underline-offset-2">Masuk disini</a>
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
