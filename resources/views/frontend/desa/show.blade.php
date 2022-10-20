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
        <div class="container-fluid">
            <div class="row">
              {{-- col lg 6 --}}
              <div class="col-lg-12">
            
                <h2 class="text-center"><b>DETAIL DESA</b></h2>
                  <form action="{{ url('desa/' . $model->kode_desa) }}}"  method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                    {{-- row1 --}}
                  <div class="row">  
                  <div class="form-group col-md-4">
                      <label for="">Nama Desa</label>
                      <input type="text" class="form-control" name="nama_desa" value="{{$model->nama_desa}}" placeholder="Nama Desa" required value="{{$errors->any() ? old('nama_desa') : ''}}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">Kode Desa</label>
                      <input type="text" class="form-control" name="kode_desa" value="{{$model->kode_desa}}" placeholder="Kode Desa" required value="{{$errors->any() ? old('kode_desa') : ''}}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">Kecamatan</label>
                      <input type="text" class="form-control" name="kecamatan" value="{{$model->kecamatan}}" placeholder="Kode Desa" required value="{{$errors->any() ? old('kecamatan') : ''}}">
                  </div>
                  </div>
                  {{-- row2 --}}
                  <div class="row">  
                      <div class="form-group col-md-4">
                          <label for="">Status Desa</label>
                          <input type="text" class="form-control" name="status_desa" value="{{$model->status_desa}}" placeholder="Status Desa" required value="{{$errors->any() ? old('status_desa') : ''}}">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="">Prioritas Desa</label>
                          <input type="text" class="form-control" name="prioritas_desa" value="{{$model->prioritas_desa}}" placeholder="Prioritas Desa" required value="{{$errors->any() ? old('prioritas_desa') : ''}}">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="">Luas Desa</label>
                          <input type="text" class="form-control" name="luas_desa" value="{{$model->luas_desa}}" placeholder="Luas Desa" required value="{{$errors->any() ? old('luas_desa') : ''}}">
                      </div>             
                  </div>
                  <div class="row">  
                      <div class="form-group col-md-6">
                          <label for="">Persentase Luas Desa terhadap Kecamatan</label>
                          <input type="text" class="form-control" name="luas_persen" value="{{$model->luas_persen}}" placeholder="Luas Persen" required value="{{$errors->any() ? old('luas_persen') : ''}}">
                      </div>             
                  <div class="form-group col-md-6">
                      <label for="">Kepadatan Penduduk</label>
                      <input type="text" class="form-control" name="kepadatan_penduduk" value="{{$model->kepadatan_penduduk}}" placeholder="Kepadatan Penduduk" required value="{{$errors->any() ? old('kepadatan_penduduk') : ''}}">
                  </div>
                  </div>

                @auth
                  <a href="{{url('desa/'.$model->kode_desa.'/edit')}}"><button type="button" class="btn btn-info float-left mr-2 mb-2"><i class="fas fa-pencil-alt"></i> Edit</button></a>
                @else
                  {{-- <a type="button" href="{{ route('login') }}"
                      class="btn btn-primary float-right mb-2">Login</a> --}}
                @endauth


                  <a href="{{ url('desa_index') }}"><button type="button" class="btn btn-danger float-left mr-2"><i class="fas fa-times"></i> Kembali</button></a>
      
                  </form>            
                      <!-- /.card-body -->
                    </div>
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
    </section>
    <!--  End About section -->
@endsection

@push('javascript')

@endpush
{{--  --}}

{{-- // GetCapabilitiesRequest
// http://localhost:8080/geoserver/wfs?service=wfs&version=1.1.0&request=GetCapabilities

// dapatkan data per nama geoserver
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=DescribeFeatureType&typeNames=bengkayang:batas_adm_bengkayang

//get feature per layer dgn format geojson
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=GetFeature&typeNames=bengkayang:batas_adm_bengkayang&outputFormat=application/json --}}