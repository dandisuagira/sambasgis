<!-- start header -->
<header class="home" id="home">
    <div class="container">
        <!-- Start nav bar  -->
        <nav class="nav-bar">
            <a href="#" class="navbar-band" >
                <img src="{{asset('doob/img/webgis.png')}}" alt=""> 
              
            </a>
            <nav>
                
                <ul class=" navbar navbar-calopas ">
                    <li class="nav-item active">
                        <a class="nav-link {{ Request::is('beranda') ? 'active' : '';}}" href="{{route('beranda')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('analisis') ? 'active' : '';}}" href="{{route('analisis')}}">Analisis <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Peta
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('desa_index')}}">Desa</a>
                          <a class="dropdown-item" href="#">Kecamatan</a>
                          <a class="dropdown-item" href="#">Pendidikan</a>
                          {{-- <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="http://sambaskab.ina-sdi.or.id/">Geoportal <span class="sr-only">(current)</span></a>
                    </li>

                    @if(Auth::check())
                    <li class="nav-item "><a href="{{route('proyek.index')}}">Proyek</a></li>
                    @else
                    @endif

                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('tentang') ? 'active' : '';}}" href="{{route('tentang')}}">Tentang <span class="sr-only">(current)</span></a>
                    </li>

                    {{-- @if(Auth::check())
                    <li class="nav-item fas fa-user"><a href="#"> {{ Auth::user()->name }}</a></li>
                    @else
                    @endif --}}
                    @if (Auth::check())
                        <div>
                            <a class="btn inverse"  href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="nav-icon fas fa-sign-out-alt"></i> 
                                {{ __('Logout') }}  
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </div>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('login')}}">Login <span class="sr-only">(current)</span></a>
                            </li>
                    @endif
                </ul>
            </nav>
            
        </nav>

        
    </div>
    <!-- End Nav Bar  -->
    
</header>