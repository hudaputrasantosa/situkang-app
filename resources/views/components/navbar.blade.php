<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="relative">
    <div
        class="hidden lg:block fixed top-0 backdrop-filter backdrop-blur-md bg-opacity-75 w-full py-1 text-gray-700 bg-white border-b border-slate-100 dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
                <a href="{{ route('homepage') }}"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">SiTukang.id</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="!open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow items-center hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('homepage') }}">Beranda</a>
                <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('jenis-tukang') }}">Jenis Tukang</a>
                <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('tentang') }}">Tentang</a>
                @if (Auth::check())
                    <div x-init="{ open: false }" @click.away="open = false" class="relative" x-data="{ open: false }">

                        <button @click="open = !open"
                            class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-2 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-2"
                                    src="@if (Auth::user()->foto) {{ url('storage/pelanggan/foto-profil/', Auth::user()->foto) }}
               @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif">
                                <span>{{ Auth::user()->nama }}</span>
                                <svg fill="currentColor" viewBox="0 0 20 20"
                                    :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>

                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-48 mt-2 origin-top-right">
                            <div class="px-3 py-2 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                                <div class="grid grid-cols-1">
                                    <a class="flex flex row items-center rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('pelanggan.profil') }}">
                                        <div class="bg-teal-500 text-white rounded-lg p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                                            </svg>

                                        </div>
                                        <div class="ml-3">
                                            <p class="font-semibold">Dashboard</p>
                                        </div>
                                    </a>

                                    <a class="flex flex row items-center rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('auth.logout') }}">
                                        <div class="bg-red-500 text-white rounded-lg p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                            </svg>

                                        </div>
                                        <div class="ml-3">
                                            <p class="font-semibold">Keluar</p>
                                            {{-- <p class="text-sm">Check your latest comments</p> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                                                <button class="inline-block relative -top-2">
                            <span class="relative inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99</span>
                            </span>
</button>




</div>

                    </div>

                @else
                    <a href="{{ route('auth.login') }}"
                        class="text-center mx-3 px-2 py-2 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                        Masuk atau Daftar
                    </a>
                @endif
            </nav>
        </div>
    </div>

    <div class="block lg:hidden w-full">
        <!-- <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white shadow"> // if shown only tablet/mobile-->
        <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-white border-t-2">
            <div id="tabs" class="flex justify-between items-center">
                <a href="{{ route('homepage') }}"
                    class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"  width="25" height="25" viewBox="0 0 42 42" class="inline-block w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />

                    </svg>
                    <span class="tab tab-home block text-xs">Beranda</span>
                </a>
                <a href="{{ route('jenis-tukang') }}"
                    class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"  width="25" height="25" viewBox="0 0 42 42" class="inline-block w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                    </svg>
                    <span class="tab tab-kategori block text-xs">Jenis Tukang</span>
                </a>
                <a href="{{ route('tentang') }}"
                    class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" width="25" height="25" viewBox="0 0 42 42" class="inline-block w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />

                    </svg>
                    <span class="tab tab-whishlist block text-xs">Tentang</span>
                </a>
                <a href="{{ route('pelanggan.profil') }}"
                    class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" width="25" height="25" viewBox="0 0 42 42" class="inline-block w-8 h-8">

  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />


                    </svg>
                    <span class="tab tab-account block text-xs">
                        @if (Auth::check())
                            {{ Auth::user()->nama }}
                        @else
                            Masuk akun
                        @endif
                    </span>
                </a>
            </div>
        </section>
    </div>
</div>


{{-- </div> --}}
{{-- </div> --}}

{{-- <div class="fixed bottom-0 w-full bg-white dark-mode:bg-gray-900 border-t border-gray-300 dark-mode:border-gray-700">
    <div x-data="{ open: false }" class="flex justify-between max-w-screen-xl px-4 mx-auto items-center">
        <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase dark-mode:text-white p-4">
            SiTukang
        </a>
        <button @click="open = !open" class="md:hidden p-4 focus:outline-none focus:shadow-outline">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <!-- ... (Icon toggle) ... -->
            </svg>
        </button>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex flex-col md:flex-row md:space-x-4 p-4 text-slate-800">
            <a href="{{ route('homepage') }}" class="nav-link">Beranda</a>
            <a href="{{ route('jenis-tukang') }}" class="nav-link">Jenis Tukang</a>
            <a href="{{ route('tentang') }}" class="nav-link">Tentang</a>
            <!-- ... (Menu items) ... -->
            @if (Auth::check())
                <!-- ... (User dropdown) ... -->
            @else
                <a href="{{ route('auth.login') }}" class="nav-link btn-login">Masuk atau Daftar</a>
            @endif
        </nav>
    </div>
</div> --}}

{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
       <div class="container">
           <a class="navbar-brand" href="{{ url('/') }}">
               {{ config('SiTukang | Beranda') }}
               SiTukang
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
           </button>


           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav me-auto">

               </ul>

               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav my-auto">
                   <!-- Authentication Links -->
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('homepage') }}">Beranda</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('jenis-tukang') }}">Jenis Tukang</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                   </li>

                   @if (Auth::check())
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                               <img class="img-profile rounded-circle px-2" width="50px"
                                   src="@if (Auth::user()->foto) {{ url('storage/pelanggan/foto-profil/', Auth::user()->foto) }}
               @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif">
                               {{ Auth::user()->nama }}
                           </a>


                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('pelanggan.profil') }}">
                                   Atur Profil
                               </a>
                               <a class="dropdown-item" href="{{ route('pelanggan.riwayat') }}">
                                   Riwayat Sewa
                               </a>
                               <a class="dropdown-item" href="{{ route('auth.logout') }}">
                                   Logout
                               </a>
                               {{-- <a class="dropdown-item" href="{{ route('auth.logout') }}"
                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                               </a>

                               <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           </div>
                       </li>
                   @else
                       <li class="nav-item">
                           <a class="btn btn-primary"
                               href="{{ route('auth.login') }}">{{ __('Login/Register') }}</a>
                       </li>
                   @endif

               </ul>
           </div>
       </div>
   </nav> --}}
