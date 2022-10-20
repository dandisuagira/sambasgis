@extends('template_frontend.master2')
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
                <div class="col" data-aos="fade-right">
                    <div class="container-fluid">
                        <h2 class="text-center"><b>LIST PROYEK</b></h2>
                        <a type="button" href="{{ route('proyek.create') }}" class="btn btn-primary float-right mt-2 mb-2">Tambah Proyek</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th>Nama Proyek</th>
                                <th>Desa</th>
                                <th>Lattitude</th>
                                <th>Longitude</th>
                                <th>Tahun</th>
                                <th>Foto</th>
                                <th colspan="3" style="width: 40px" style="text-align: center" align="center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key=>$value)
                                <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->nama_proyek}}</td>
                                <td>{{$value->desa->nama_desa}}</td>
                                <td>{{$value->lat}}</td>
                                <td>{{$value->long}}</td>
                                <td>{{$value->tahun}}</td>
                                {{-- <td>
                                    <img src="{{asset('fotoproyek/'.$value->foto)}}" alt="" style="width:30px;" >
                                </td> --}}
                                <td>
                                    <a href="{{asset('storage/'.$value->foto1)}}" target="blank">Lihat Gambar</a>
                                </td>
                                 
                                <td> 
                                      <a style="margin-right:7px" href="{{ route('proyek.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Edit</a>
                                </td>   
                                <td>
                                    <form action="{{ url('proyek/'. $value->id) }}" method="POST">
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

