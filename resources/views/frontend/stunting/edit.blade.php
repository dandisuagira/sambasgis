@extends('template_frontend.master2')
@section('title','Edit Stunting')

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
                    <h2 class="text-center"><b>EDIT STUNTING</b></h2>
                    <form action="{{ url('stunting/' . $model->id) }}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="row">  

                            <div class="form-group col-sm-4">
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
                            <div class="form-group col-md-4">
                                <label for="">Balita Stunting</label>
                                <input type="text" class="form-control" name="balita_stunting" placeholder="Balita Stunting" required value="{{ $model->balita_stunting }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Persen Stunting</label>
                                <input type="text" class="form-control" name="persen_stunting" placeholder="Persentase Stunting" required value="{{ $model->persen_stunting }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Lokus Stunting</label>
                                <input type="text" class="form-control" name="lokus_stunting" placeholder="Lokus Stunting" required value="{{ $model->lokus_stunting }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Tahun</label>
                                <input type="text" class="form-control" name="tahun" placeholder="Tahun" required value="{{ $model->tahun }}">
                            </div>
                        </div>


                        <span><button style="margin-right:4px" type="submit" class="btn btn-success float-left"><i class="fas fa-save"></i> Simpan Data</button></span>
                        <a href="{{ url('stunting') }}"><button type="button" class="btn btn-danger float-left mr-2"><i class="fas fa-times"></i> Kembali</button></a>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
@endsection

