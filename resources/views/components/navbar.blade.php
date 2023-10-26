   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('SiTukang | Beranda') }}
                    SiTukang
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('homepage') }}">Beranda</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('jenis') }}">Jenis Tukang</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                            </li>
                         
                        @if (Auth::check())
                          {{-- {{ Auth::user()->nama}}  --}}
                              
                        <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               {{ Auth::user()->nama }}
                           </a>
                           
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('auth.logout') }}"
                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   {{ __('Atur Profil') }}
                               </a>
                               <a class="dropdown-item" href="{{ route('auth.logout') }}"
                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   {{ __('Riwayat Sewa') }}
                               </a>
                               <a class="dropdown-item" href="{{ route('auth.logout') }}"
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
                                <a class="btn btn-primary" href="{{ route('auth.login') }}">{{ __('Login/Register') }}</a>
                            </li>                                                  
                        @endif           
                                                          
                    </ul>
                </div>
            </div>
        </nav>