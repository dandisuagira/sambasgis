@extends('template_frontend.master2')
@section('title', 'Peta Analisis')

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
        <div class="container mb-5">
            <div class="row">
                <div class="col col1" data-aos="fade-right">
                    <div class="container-fluid">
                        <h2 class="text-center"><b>MAP</b></h2>
                        <div id="map" class="container"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section  -->
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col" data-aos="fade-right">
                    <div class="container-fluid">
                        <h2 class="text-center"><b>LIST PROYEK</b></h2>
                        <a type="button" href="{{ route('proyek.create') }}"
                            class="btn btn-primary float-right mt-2 mb-2">Tambah Proyek</a>
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
                                    <th colspan="3" style="width: 40px" style="text-align: center" align="center">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->nama_proyek }}</td>
                                        <td>{{ $value->desa->nama_desa }}</td>
                                        <td>{{ $value->lat }}</td>
                                        <td>{{ $value->long }}</td>
                                        <td>{{ $value->tahun }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $value->foto1) }}" target="blank">Lihat
                                                Gambar</a>
                                        </td>

                                        <td>
                                            <a style="margin-right:7px" href="{{ route('proyek.edit', $value->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ url('proyek/' . $value->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i>
                                                    Delete</button>
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
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        var map = L.map('map').setView([1.3311551, 109.4964442], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // var myData = {!! json_encode($datas) !!};
        // console.log(myData);

        //SEMENTARA
        <?php foreach($datas as $data) { ?>

        var isPopup =
            // "<h6>Nama Proyek :<?= $data->nama_proyek ?></h6>";

            "<li class='list-group-item active'><h6 class='text-white'>Nama Proyek : <?= $data->nama_proyek ?></h6></li><li class='list-group-item'><h6 class='text-black'>Nama Desa : <?= $data->desa->nama_desa ?></h6></li>";

        L.marker([<?= $data->lat ?>, <?= $data->long ?>]).addTo(map)
            .bindPopup(isPopup)
            .openPopup();
        <?php } ?>
    </script>
@endpush
