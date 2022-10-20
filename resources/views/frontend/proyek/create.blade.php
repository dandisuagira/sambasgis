@extends('template_frontend.master2')
@section('title','Tambah Proyek')

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
                <div class="col" data-aos="fade-right">
                    <h2 class="text-center"><b>TAMBAH PROYEK</b></h2>
                    <form action="{{ route('proyek.store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">  
                            <div class="form-group col-md-6">
                                <label for="">Nama Proyek</label>
                                <input type="text" class="form-control" name="nama_proyek" placeholder="Nama Proyek" required value="{{$errors->any() ? old('id') : ''}}">
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="">Nama Desa</label>
                                <input type="text" class="form-control" name="nama_desa" placeholder="Nama Desa" required value="{{$errors->any() ? old('nama_desa') : ''}}">
                            </div>   --}}
                            
                            
                            <div class="form-group col-sm-6">
                                <label for="desa_id">Nama Desa </label>
                                <select name="desa_id" id="desa_id" class="form-control">
                                    <option disabled selected hidden>-Pilih Desa-</option>
                                    @foreach ($desa as $item)
                                    <option value="{{$item->kode_desa}}" {{old('desa_id') == $item->kode_desa ? 'selected' : null }}>
                                        {{$item->nama_desa}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Lattitude</label>
                                <input type="text" class="form-control" name="lat" placeholder="Lattitude" required value="{{$errors->any() ? old('lat') : ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Langitude</label>
                                <input type="text" class="form-control" name="long" placeholder="Longitude" required value="{{$errors->any() ? old('long') : ''}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="foto1" placeholder="Foto" required value="{{$errors->any() ? old('foto') : ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tahun</label>
                                <input type="text" class="form-control" name="tahun" placeholder="Tahun" required value="{{$errors->any() ? old('tahun') : ''}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Kode Proyek</label>
                                <input type="text" class="form-control" name="kode_proyek" placeholder="Kode Proyek" required value="{{$errors->any() ? old('kode_proyek') : ''}}">
                            </div>
                        </div>

                        <span><button style="margin-right:4px" type="submit" class="btn btn-success float-left"><i class="fas fa-save"></i> Simpan Data</button></span>
                        <a href="{{ url('desa') }}"><button type="button" class="btn btn-danger float-left mr-2"><i class="fas fa-times"></i> Kembali</button></a>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
@endsection

