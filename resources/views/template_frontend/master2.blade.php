<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- icon of the title bar -->
    <link rel="icon" href="{{asset('doob/img/favicon.png')}}" type="image/icon type">
    <!-- Main Template css file -->
    {{-- cth --}}
    {{-- {{asset('AdminLte/plugins/fontawesome-free/css/all.min.css')}} --}}
    <link rel="stylesheet" href="{{asset('doob/css/style.css')}}">
    <!--  normalize css file -->
    <link rel="stylesheet" href="{{asset('doob/css/normalize.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{asset('doob/css/all.min.css')}}">
    <!--  Google font :  Work Sans -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- AOS Animate On Scroll Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
                /*Legend specific*/
                .legend {
        padding: 6px 8px;
        font: 14px Arial, Helvetica, sans-serif;
        background: rgb(7, 7, 7);
        background: rgba(255, 255, 255, 0.8);
        /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
        /*border-radius: 5px;*/
        line-height: 24px;
        color: #555;
        }
        .legend h4 {
        text-align: center;
        font-size: 16px;
        margin: 2px 12px 8px;
        color: #777;
        }

        .legend span {
        position: relative;
        bottom: 3px;
        }

        .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin: 0 8px 0 0;
        opacity: 0.7;
        }

        .legend i.icon {
        background-size: 18px;
        background-color: rgba(255, 255, 255, 1);
        }


                .dropdown-menu li {
        position: relative;
        }
        .dropdown-menu .dropdown-submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: -7px;
        }
        .dropdown-menu .dropdown-submenu-left {
        right: 100%;
        left: auto;
        }
        .dropdown-menu > li:hover > .dropdown-submenu {
        display: block;
        }

        .control-coordinate {
            font-size: 15px;
            background: #ecf0f4;
            opacity: 80%;
            /* border-radius: 5px; */
            color: rgb(22, 21, 21);
            padding: 5px;
        }
        
    </style>
    @stack('css')
</head>
<body>
@include('template_frontend.header')
    <!-- End header -->
    <!--  End SERVICES SECTION -->
    @yield('content')


    <!-- blog section -->
    {{-- <section class="blog" id="blog">
        <div class="container-fluid">
            <div class="img-aside4">
                <img src="img/aside4.svg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="rows">
                <div class="row row1" >
                    <h4 data-aos="zoom-in-right">BLOG STORIES</h4>
                    <h2 data-aos="zoom-in-left">Check Our News</h2>
                </div>
                <div class="row row2">
                    <div class="articles" >
                        <div class="article1 article"  data-aos="fade-right">
                            <h6>NEW ADVENTURE</h6>
                            <p>Thursday, April 22, 2021</p>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
                        </div>
                        <div class="article2 article" data-aos="fade-up">
                            <h6>NEW ADVENTURE</h6>
                            <p>Thursday, April 22, 2021</p>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
                        </div>
                        <div class="article3 article" data-aos="fade-left">
                            <h6>NEW ADVENTURE</h6>
                            <p>Thursday, April 22, 2021</p>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </section> --}}
    <!-- End blog section -->
   
    {{-- <section class="portfolio bg-primary" id="portfolio">
        <div class="container">
            <div class="rows ">
                <h2 class="text-center  p-1 mb-1 text-white ">LAYER</h2>
                <div class="row mt-2 justify-content-center" >
                     <a href="{{route('desa_index')}}" class="mr-2 mb-2"><img src="{{asset('image/1desa.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="{{route('luasdesa_index')}}" class="mr-2  mb-2"><img src="{{asset('image/2luaswilayah.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="{{route('dusun_index')}}" class="mr-2  mb-2"><img src="{{asset('image/3dusun.png')}}" alt="" data-aos="zoom-in-down"></a>
                </div>
                <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="{{route('penduduk_index')}}" class="mr-2 mb-2"><img src="{{asset('image/4sebaranpenduduk.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="{{route('kesehatan_index')}}" class="mr-2 mb-2"><img src="{{asset('image/5faskes.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="{{route('pendidikan_index')}}" class="mr-2 mb-2"><img src="{{asset('image/6pendidikan.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div>
                <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/7lokus.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/8kawasan.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/9nilaistatusidm.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div>
                {{-- <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/10desaprioritas.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/8kawasan.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/9nilaistatusidm.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div> --}}
            </div>

        </div>
    </section> --}}

    
@include('template_frontend.footer')
    <span class="scrollToTop" data-aos="fade-left" >
        <img src="{{asset('doob/img/fi-rr-arrow-small-up.svg')}}" alt="icon"/>
    </span>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('doob/javascript/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    
</script>

    @stack('javascript')
</body>
</html>