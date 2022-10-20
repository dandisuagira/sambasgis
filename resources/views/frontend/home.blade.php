@extends('template_frontend.master')
@section('title','WebGIS Kabupaten Sambas')
@section('content')
    


    {{-- test peta --}}
    {{-- <div class="peta pt-4 mb-4">
        <div class="container">
            <h1 class="peta text-center mb-4 text-uppercase">Kategori</h1>
            <div class="flex-container">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://barage.petaku.online/assets/gambar/administrasi.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Administrasi</h5>
                        <a href="https://barage.petaku.online/peta/administrasi" class="btn btn-primary">Lihat Peta</a>
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://barage.petaku.online/assets/gambar/pendidikan.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">kesehatan</h5>
                        <a href="https://barage.petaku.online/peta/kesehatan" class="btn btn-primary">Lihat Peta</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://barage.petaku.online/assets/gambar/pendidikan.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Pendidikan</h5>
                        <a href="https://barage.petaku.online/peta/pendidikan" class="btn btn-primary">Lihat Peta</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- end test peta --}}

    {{-- card --}}
    <!-- blog section -->
    <section class="blog bg-primary" id="blog">
        <div class="container bg-primary">
            <div class="rows">
                <h2 class="text-center p-1 mb-1 text-white">KATEGORI WILAYAH</h2>
                <div class="row">
                    <div class="articles" >
                       
                        <div class="article"  data-aos="fade-right">
                            <a href="{{ url('desa_index') }}"><h4>DESA</h4></a>
                            <img src="{{asset('image/desasambas.png')}}" width="100%" alt="" data-aos="zoom-in-down">
                            <p>Berisi Informasi Pembangunan Wilayah Administrasi Kabupaten Sambas Berdasarkan Batas Desa</p>
                            <a href="{{ url('desa_index') }}"><button type="button" class="btn btn-info">Detail</button></a>
                        </div>
                        <div class="article"  data-aos="fade-right">
                            <a href="{{route('kecamatan_index')}}"><h4>KECAMATAN</h4></a>
                            <img src="{{asset('image/kecamatansambas.png')}}" width="100%" alt="" data-aos="zoom-in-down">
                            <p>Berisi Informasi Pembangunan Wilayah Administrasi Kabupaten Sambas Berdasarkan Batas Kecamatan</p>
                            <a href="{{route('kecamatan_index')}}"><button type="button" class="btn btn-info">Detail</button></a>
                        </div>
                        <div class="article"  data-aos="fade-right">
                            <a href="www.google.com"><h4>KABUPATEN</h4></a>
                            <img src="{{asset('image/pendidikan.png')}}" width="100%" alt="" data-aos="zoom-in-down">
                            <p>Berisi Informasi Pembangunan Wilayah Administrasi Kabupaten Sambas Berdasarkan Batas Kabupaten</p>
                            <a href="#"><button type="button" class="btn btn-info">Detail</button></a>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </section>
    {{-- card --}}



    {{-- <!-- Portfolio section -->
    <section class="portfolio bg-primary" id="portfolio">
        <div class="container">
            <div class="rows ">
                <h2 class="text-center  p-1 mb-1 text-white ">LAYER</h2>
                <div class="row mt-2 justify-content-center" >
                     <a href="{{route('desa_index')}}" class="mr-2 mb-2"><img src="{{asset('image/1desa.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="#" class="mr-2  mb-2"><img src="{{asset('image/2luaswilayah.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="{{route('dusun_index')}}" class="mr-2  mb-2"><img src="{{asset('image/3dusun.png')}}" alt="" data-aos="zoom-in-down"></a>
                </div>
                <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/4sebaranpenduduk.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/5faskes.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/6pendidikan.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div>
                <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/7lokus.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/8kawasan.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/9nilaistatusidm.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div>
                <div class="row mt-2 mb-2 justify-content-center" >
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/10desaprioritas.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/8kawasan.png')}}" alt="" data-aos="zoom-in-down"></a>
                     <a href="www.google.com" class="mr-2 mb-2"><img src="{{asset('image/9nilaistatusidm.png')}}" alt="" data-aos="zoom-in-down"></a>
                    
                </div>
            </div>

        </div>
    </section> --}}
    <!-- End Portfolio section -->

@endsection