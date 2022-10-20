@extends('template_frontend.master1')
@section('title','Edit Dusun')

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
            
                <h2 class="text-center"><b>EDIT DUSUN</b></h2>
                  <form action="{{ url('dusun/' . $model->id) }}}"  method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                    {{-- row1 --}}
                  <div class="row">  
                  <div class="form-group col-md-4">
                      <label for="">Nama Desa</label>
                      <input type="text" readonly class="form-control" name="nama_desa" value="{{$model->desa->nama_desa}}" placeholder="Nama Desa" required value="{{$errors->any() ? old('nama_desa') : ''}}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">Kode Desa</label>
                      <input type="text" readonly class="form-control" name="desa_id" value="{{$model->desa_id}}" placeholder="Kode Desa" required value="{{$errors->any() ? old('kode_desa') : ''}}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">Jumlah Dusun</label>
                      <input type="text" class="form-control" name="jumlah_dusun" value="{{$model->jumlah_dusun}}" placeholder="Jumlah Dusun" required value="{{$errors->any() ? old('jumlah_dusun') : ''}}">
                  </div>
                  </div>
                  {{-- row2 --}}
                  <div class="row">  
                      <div class="form-group col-md-4">
                          <label for="">Nama Dusun</label>
                          <input type="text" class="form-control" name="nama_dusun" value="{{$model->nama_dusun}}" placeholder="Nama Dusun" required value="{{$errors->any() ? old('nama_dusun') : ''}}">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="">Jumlah RT</label>
                          <input type="text" class="form-control" name="rt" value="{{$model->rt}}" placeholder="Prioritas Desa" required value="{{$errors->any() ? old('rt') : ''}}">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="">Jumlah RW</label>
                          <input type="text" class="form-control" name="rw" value="{{$model->rw}}" placeholder="Luas Desa" required value="{{$errors->any() ? old('rw') : ''}}">
                      </div>             
                  </div>

                  <span><button style="margin-right:4px" type="submit" class="btn btn-success float-left"><i class="fas fa-save"></i> Simpan Data</button></span>
                  <a href="{{ url('dusun_index') }}"><button type="button" class="btn btn-danger float-left mr-2"><i class="fas fa-times"></i> Kembali</button></a>
      
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