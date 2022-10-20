@extends('template_frontend.master1')
@section('title','Peta Analisis')

@push('css')
    <!--         {{-- leaflet css --}} -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

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
        <div class="container">
            <div class="row">
                <div class="col col1" data-aos="fade-right">
                    <div class="container-fluid">
                        <h2 class="text-center"><b>DESA</b></h2>
                        <a type="button" href="{{ route('desa_index') }}" class="btn btn-primary float-right mt-2 mb-2">Peta Sebaran Desa</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th>Nama Desa</th>
                                <th>Kode Desa</th>
                                <th>Status Desa</th>
                                <th>Prioritas Desa</th>
                                <th>Luas Desa</th>
                                <th colspan="2" style="width: 40px" style="text-align: center" align="center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key=>$value)
                                <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->nama_desa}}</td>
                                <td>{{$value->kode_desa}}</td>
                                <td>{{$value->status_desa}}</td>
                                <td>{{$value->prioritas_desa}}</td>
                                <td>{{$value->luas_desa}} Km2</td>
                                    {{-- <td>
                                        <a style="margin-right:7px" class="btn btn-info btn-sm" href="{{url('keluhan/'.$value->id.'/edit')}}" ><i class="fas fa-pencil-alt" ></i> Edit</a>
                                    </td> --}}
                                    <td> 
                                      <a style="margin-right:7px" href="{{ route('desa.edit', $value->kode_desa) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Edit</a>
                                    </td>   
                                <td>
                                    <form action="{{ url('desa/'. $value->kode_desa) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                </td>      
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
@endsection

{{--  --}}

{{-- // GetCapabilitiesRequest
// http://localhost:8080/geoserver/wfs?service=wfs&version=1.1.0&request=GetCapabilities

// dapatkan data per nama geoserver
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=DescribeFeatureType&typeNames=bengkayang:batas_adm_bengkayang

//get feature per layer dgn format geojson
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=GetFeature&typeNames=bengkayang:batas_adm_bengkayang&outputFormat=application/json --}}