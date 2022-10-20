@extends('template_frontend.master1')
@section('title','Detail Layanan Kesehatan')

@push('css')
<!--         {{-- leaflet css --}} -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    #map {
        width: 100%;
        height: 100vh;
    }

</style>
@endpush

@section('content')

<section>

</section>
<!-- About section  -->
<section class="about" id="about">
     <h2 class="text-center"><b>DETAIL LAYANAN KESEHATAN</b></h2>
    <div class="row border">
        <div class="col-md-4">

            <div class="card-body" style="min-height: 200px;">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('image/rs1.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('image/puskesmastemajuk.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('image/puskesmaspaloh.jpeg')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <hr>
                {{-- id profil tdk dpt ditarik dari geoserver --}}
                {{-- <div class="form-group col-md-4">
                    <label for="total" class="form-label">Nama </label>
                    <input type="text" readonly  id="profil"  class="form-control " name="profil" placeholder="" autofocus autocomplete="total">
                  </div> --}}

            </div>
        </div>

        
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="sda-tab" data-toggle="tab" href="#sda" role="tab" aria-controls="sda"
                        aria-selected="false">Sumber Daya Manusia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="prasarana-tab" data-toggle="tab" href="#prasarana" role="tab"
                        aria-controls="prasarana" aria-selected="false">Prasarana</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="sda" role="tabpanel" aria-labelledby="sda-tab">
                    
                    {{-- row3 --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">ID Layanan Kesehatan</label>
                            <input type="text" readonly class="form-control" name="id" value="{{$lakes->id}}"
                                placeholder="Id" required value="{{$errors->any() ? old('nama_desa') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nama Fasilitas</label>
                            <input type="text" class="form-control" name="nama_fasilitas" value="{{$lakes->nama_lakes}}" placeholder="Pustu/Polindes.." required
                                value="{{$errors->any() ? old('rw') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Desa</label>
                            {{-- {{$lakes->desa->nama_desa}} --}}
                            <input type="text" class="form-control" readonly name="" value="" placeholder="Desa..." required
                                value="{{$errors->any() ? old('rw') : ''}}">
                        </div>
                    </div>


                    {{-- row1 --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Kecamatan</label>
                            {{-- {{$lakes->desa->kecamatan}} --}}
                            <input type="text" class="form-control" readonly name="kecamatan" value=""
                                placeholder="Kecamatan.." required value="{{$errors->any() ? old('rt') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Jumlah Dokter</label>
                            <input type="text" class="form-control" name="dokter" value="{{$lakes->dokter}}"
                                placeholder="Dokter" required value="{{$errors->any() ? old('jumlah_dusun') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Jumlah Bidan</label>
                            <input type="text" class="form-control" name="bidan" value="{{$lakes->bidan}}"
                                placeholder="Bidan" required value="{{$errors->any() ? old('nama_dusun') : ''}}">
                        </div>
                    </div>
                    {{-- row3 --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Jumlah Perawat</label>
                            <input type="text" class="form-control" name="rt" value="{{$lakes->perawat}}"
                                placeholder="Perawat" required value="{{$errors->any() ? old('rt') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tenaga Medis Lain</label>
                            <input type="text" class="form-control" name="" value="" placeholder="Test" required
                                value="{{$errors->any() ? old('rw') : ''}}">
                        </div>
                        
                    </div>

                    
                    
                    
                </div>
                <div class="tab-pane fade" id="prasarana" role="tabpanel" aria-labelledby="prasarana-tab">
                    {{-- row1 --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Ambulan</label>
                            <input type="text" class="form-control" name="disiisesuaiDB" value=""
                                placeholder="Ambulan" required value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Sumber Listrik</label>
                            <input type="text" class="form-control" name="dokter" value=""
                                placeholder="Sumber Listrik" required value="{{$errors->any() ? old('jumlah_dusun') : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Sumber Air</label>
                            <input type="text" class="form-control" name="bidan" value=""
                                placeholder="Air" required value="{{$errors->any() ? old('nama_dusun') : ''}}">
                        </div>
                    </div>
                    {{-- row2 --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Internet</label>
                            <input type="text" class="form-control" name="disiisesuaiDB" value=""
                                placeholder="Internet" required value="">
                        </div>
                    </div>
                </div>
                {{-- check auth user  --}}
                <div class="row text-center">
                    @auth
                    <a href="{{route('editLakes',$lakes->id)}}"><button type="button" class="btn btn-info ml-3  mr-2 mb-2"><i
                                class="fas fa-pencil-alt"></i> Edit Data</button></a>
                    @else
                    @endauth
                    <a href="{{ url('kesehatan_index') }}"><button type="button" class="btn btn-danger ml-3 mr-2"><i
                                class="fas fa-angle-left"></i> Kembali</button></a>
                </div>
            </div>
        </div>
        
        </div>

</section>
<!--  End About section -->
@endsection

@push('javascript')
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>

    const lakesController = <?= $lakesController ?>;
        function objectClone(obj) {
            return JSON.parse(JSON.stringify(obj));
        }
        
        const DataLakes = objectClone(lakesController);
        const Lakes = DataLakes.features

        // console.log(Lakes);
        
    
    var Id_puskesmas = <?= $lakes->id; ?>;
    // console.log(Id_puskesmas)
    
    // var lakes = {!! json_encode($lakes) !!};
    // console.log(lakes)

    
    // function onEachFeature(feature) {
    //     for (let i = 0; i < Lakes.length; i++) {
    //         if (feature[i].properties.objectid == lakes[i].id){
    //             document.getElementById("profil").innerHTML =
    //             "<p><strong>Nama Puskesmas :</strong>" + feature[i].properties.namobj +
    //                 "</p>";
    //         }
    //         // if (feature[i].properties.objectid == Id_puskesmas) {
    //         //     document.getElementById("profil").innerHTML +=
    //         //     "<p><strong>Nama Puskesmas :</strong>" + feature[i].properties.namobj +
    //         //         "</p>";
    //         //     }
    //         }
    //     };

    function onEachFeature(feature) {
        for (let i = 0; i < feature.length; i++) {

            if (feature[i].objectid == Id_puskesmas) {
                document.getElementById("profil").innerHTML +=
                    "<p><strong>Nama Puskesmas :</strong>" + lakes[i].namobj +
                    "</p>";
            }
    console.log(lakes)
        }
    };
   
    // var URL = "http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_layanankesehatan_desa_sambas_pt_50k_610120220922062106&outputFormat=application%2Fjson";


    // var WFSLayer = null;
    // var ajax = $.ajax({
    //     url: URL,
    //     dataType: 'json',
    //     jsonpCallback: 'getJson',
    //     success: function(response) {
    //         WFSLayer = L.geoJson(response, {
    //             // style: style,
    //             onEachFeature: onEachFeature
    //         });
    //     }
    // });


</script>


@endpush
{{--  --}}

{{-- // GetCapabilitiesRequest
// http://localhost:8080/geoserver/wfs?service=wfs&version=1.1.0&request=GetCapabilities

// dapatkan data per nama geoserver
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=DescribeFeatureType&typeNames=bengkayang:batas_adm_bengkayang

//get feature per layer dgn format geojson
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=GetFeature&typeNames=bengkayang:batas_adm_bengkayang&outputFormat=application/json --}}
