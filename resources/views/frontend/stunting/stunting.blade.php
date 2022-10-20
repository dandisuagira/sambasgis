@extends('template_frontend.master1')
@section('title','Desa Stunting')

@push('css')
    <!--         {{-- leaflet css --}} -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- Lejen CSS kiri --}} 
    <link rel="stylesheet" href="{{asset('legend/leaflet.legend.css')}}" />


    <style>
        
        #map {
            width: 100%;
            height: 100vh;
        }


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
                        <h2 class="text-center"><b>SEBARAN DESA STUNTING</b></h2>
                        {{-- {{$res['features']}} --}}
                        <div id="map" class="container"></div>  
                        @auth
                        <a type="button" href="{{ route('stunting.index') }}" class="btn btn-primary float-left mt-2 mb-2">Stunting Index</a>
                        @else
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
   
@endsection

@push('javascript')
    <!--  {{-- leaflet js --}} -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>

    {{-- leaflet  legend js--}}
    <script type="text/javascript" src="{{asset('legend/leaflet.legend.js')}}"></script>

    <script>
        // Inisialisasi MAP dasar  
        // osm map
        const desaController = <?= $desaController ?>;

        function objectClone(obj) {
            return JSON.parse(JSON.stringify(obj));
        }

        const DataDesa = objectClone(desaController);
        const Desaa = DataDesa.features


        var map = L.map('map',{
          attributionControl: false, 
          center: [1.4460029868582618, 109.31332264681605],
          zoom: 10,
          minZoom: 7,
          maxZoom: 25,
          zoomControl: true
        });
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 25,
            maxNativeZoom: 19
        });
        osm.addTo(map);
        
         //google street
        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            // googleStreets.addTo(map);

            //google satelite 
        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            // googleSat.addTo(map);


        var marker = L.marker([1.4149386434390463, 109.32303328065888]).bindPopup("<b>Kabupaten Sambas!</b>")
        .addTo(map);
        
        
        //coordinat hover
        let lat = 1.3311551;
        let lng = 109.4964442;
        
        L.Control.Coordinate = L.Control.extend({
            onAdd: (map) => {
                let el = L.DomUtil.create('div', 'control-coordinate');
                el.innerHTML = "Lat : <span class='latNow'>" + lat + "</span>, Lng : <span class='lngNow'>" +
                    lng +
                    "</span>";
                return el;
            }
        });

        let controlCoordinate = (opts) => {
            return new L.Control.Coordinate(opts);
        }
        controlCoordinate({
            position: 'bottomleft'
        }).addTo(map);

        map.on('mousemove', (e) => {
            let latlng = e.latlng;
            let latNow = document.querySelector('.latNow');
            let lngNow = document.querySelector('.lngNow');
            latNow.innerHTML = latlng.lat.toFixed(3);
            lngNow.innerHTML = latlng.lng.toFixed(3);

        });
        
        var admStyle = {
            fillColor : "black",
            color : "blue",
            weight : 1,
            oppacity : 1,
            fillOppacity : 0.5,
        };
        var admStyle1 = {
            icon : yellowIcon,
        };

        
        var wfs_url_adm = '{{asset('geojson/desa.geojson')}}';
    

        //buat variabel penampung agar dapat overlay
        var sambasAdm = new L.layerGroup();
        var sambasDesa = new L.layerGroup();
        var stunting2019 = new L.layerGroup();
        var stunting2020 = new L.layerGroup();
        var tingkat2019 = new L.layerGroup();
        var tingkat2020 = new L.layerGroup();


        //icon 
        var yellowIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        
        function getColor(d) {
        return (d) == 'BERKEMBANG' ? '#570a0a' :
            (d) == 'TERTINGGAL' ? '#14dba9' :
            (d) == 'SANGAT TERTINGGAL' ? '#121211' :
            (d) == 'MANDIRI' ? '#fbff00' :
            (d) == 'MAJU' ? '#2fff00' :

            '##0a0d0c';
        }
        
     //warna berdasarkan tingkat stunting
        function getColorDB(d) {
        return (d) == 'RENDAH' ? 'GREEN' :
            (d) == 'SEDANG' ? 'ORANGE' :
            (d) == 'TINGGI' ? 'RED' :
            'BLACK';
    }

        function tahunStunting2020(d) {
        return (d) == 'LOKUS STUNTING 2020' ? 'YELLOW' :
            (d) == 'BEBAS STUNTING' ? 'GREEN' :
            'BLACK';
    }
        function tahunStunting2019(d) {
        return (d) == 'LOKUS STUNTING 2019' ? 'YELLOW' :
            (d) == 'BEBAS STUNTING' ? 'GREEN' :
            'BLACK';
    }

    //warna berdasarkan kecamatan
    //     function getColorDB(d) {
    //     return (d) == 'SELAKAU' ? 'grey' :
    //         (d) == 'SELAKAU TIMUR' ? 'blue' :
    //         (d) == 'PEMANGKAT' ? 'green' :
    //         (d) == 'SEMPARUK' ? 'yellow' :
    //         (d) == 'SALATIGA' ? 'cyan' :
    //         (d) == 'TEBAS' ? 'magenta' :
    //         (d) == 'TELUK KERAMAT' ? 'purple' :

    //         'red';
    // }


        // $.getJSON(wfs_url_adm, function(data) {
        // batas_administrasi_sambas = L.geoJson(data, {
            // style: function(feature) {
            //     return {
            //         opacity: 1,
            //         color: getColor(feature.properties.status_idm),
            //         fillColor: getColor(feature.properties.status_idm)
            //     }
        //         layer.bindPopup("Nama Desa: " + f.properties.namobj +
        //              "<br> Kode Desa: " + Math.ceil(f.properties.kode_desa)  + 
        //              '<br>' + "Nama Kecamatan: " + f.properties.wiadkc  +
        //             //  "<br><a class='btn btn-outline-primary' href='{{ url('desa/"+f.properties.kode_desa+"/edit')}}'> Detail</a>"
        //              "<br><a class='btn btn-outline-primary' href='desa/" + f.properties.kode_desa + "/edit'> Detail</a>"
        //              );

        //     }
        // }).addTo(map);
        // });


 


        //sambas adm saja
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {
                    // console.log(res);
                    l.bindPopup("Nama Desa: " + f.properties.namobj +
                     "<br> Kode Desa: " + Math.ceil(f.properties.kode_desa)  + 
                     '<br>' + "Nama Kecamatan: " + f.properties.wiadkc  
                     ).addTo(sambasAdm)                      
                    },
                style : function(feature){
                   return { 
                    opacity: 1,
                    color: 'blue',
                    fillColor: 'grey'
                    }
                }
                    
                }
                ).addTo(map);
                map.fitBounds(layer.getBounds());
            })



            //2019 desa stunting
        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var stunting2019 = {!! json_encode($stunting_2019) !!};
                    // console.log(stunting2020)
                    for (let i = 0; i < stunting2019.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting2019[i].desa_id == f.properties.kode_desa) {
                        BalitaStunting = stunting2019[i].balita_stunting;
                        PersenStunting = stunting2019[i].persen_stunting;
                        LokusStunting = stunting2019[i].lokus_stunting;
                        Tahun = stunting2019[i].tahun;
                        // statusKawasan = sites[i].status_kawasan;
                        // no_kk2 = penduduk[i].no_kk;
                        // console.log(BalitaStunting);
                    }
                    }


                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Persentase Stunting : " + BalitaStunting + '%' +
                            "</li><li class='list-group-item'>Tingkat : " + PersenStunting  +
                            "</li><li class='list-group-item'> " + LokusStunting  +
                            "</li><li class='list-group-item'>Tahun : " + Tahun  
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var stunting2019 = {!! json_encode($stunting_2019) !!};
                    for (let i = 0; i < stunting2019.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting2019[i].desa_id == feature.properties.kode_desa) {
                        // PersenStunting = stunting[i].persen_stunting;
                        LokusStunting2019 = stunting2019[i].lokus_stunting;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: tahunStunting2019(LokusStunting2019),
                    fillColor: tahunStunting2019(LokusStunting2019)
                }
                    }
                    
                }
                
                ).addTo(stunting2019);
                map.fitBounds(layer.getBounds());
            })



        //2019 tingkat stunting
        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var stunting = {!! json_encode($stunting_2019) !!};
                    // console.log(stunting)
                    for (let i = 0; i < stunting.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting[i].desa_id == f.properties.kode_desa) {
                        BalitaStunting = stunting[i].balita_stunting;
                        PersenStunting = stunting[i].persen_stunting;
                        LokusStunting = stunting[i].lokus_stunting;
                        Tahun = stunting[i].tahun;
                        // statusKawasan = sites[i].status_kawasan;
                        // no_kk2 = penduduk[i].no_kk;
                        // console.log(BalitaStunting);
                    }
                    }


                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Persentase Stunting : " + BalitaStunting + '%' +
                            "</li><li class='list-group-item'>Tingkat : " + PersenStunting  +
                            "</li><li class='list-group-item'> " + LokusStunting  +
                            "</li><li class='list-group-item'>Tahun : " + Tahun  
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var stunting = {!! json_encode($stunting_2019) !!};
                    for (let i = 0; i < stunting.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting[i].desa_id == feature.properties.kode_desa) {
                        PersenStunting = stunting[i].persen_stunting;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorDB(PersenStunting),
                    fillColor: getColorDB(PersenStunting)
                }
                    }
                    
                }
                
                ).addTo(tingkat2019);
                map.fitBounds(layer.getBounds());
            })
       

      

             //2020 tingkat stunting
        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var stuntingDesa2020 = {!! json_encode($stunting_2020) !!};
                    // console.log(stunting)
                    for (let i = 0; i < stuntingDesa2020.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stuntingDesa2020[i].desa_id == f.properties.kode_desa) {
                        BalitaStunting = stuntingDesa2020[i].balita_stunting;
                        PersenStunting = stuntingDesa2020[i].persen_stunting;
                        LokusStunting = stuntingDesa2020[i].lokus_stunting;
                        Tahun = stuntingDesa2020[i].tahun;
                        // statusKawasan = sites[i].status_kawasan;
                        // no_kk2 = penduduk[i].no_kk;
                        // console.log(BalitaStunting);
                    }
                    }


                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Persentase Stunting : " + BalitaStunting + '%' +
                            "</li><li class='list-group-item'>Tingkat : " + PersenStunting  +
                            "</li><li class='list-group-item'> " + LokusStunting  +
                            "</li><li class='list-group-item'>Tahun : " + Tahun  
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var stuntingDesa2020 = {!! json_encode($stunting_2020) !!};
                    for (let i = 0; i < stuntingDesa2020.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stuntingDesa2020[i].desa_id == feature.properties.kode_desa) {
                        PersenStunting = stuntingDesa2020[i].persen_stunting;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorDB(PersenStunting),
                    fillColor: getColorDB(PersenStunting)
                }
                    }
                    
                }
                
                ).addTo(tingkat2020);
                map.fitBounds(layer.getBounds());
            })


             //2020 desa stunting
        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var stunting2020 = {!! json_encode($stunting_2020) !!};
                    // console.log(stunting2020)
                    for (let i = 0; i < stunting2020.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting2020[i].desa_id == f.properties.kode_desa) {
                        BalitaStunting = stunting2020[i].balita_stunting;
                        PersenStunting = stunting2020[i].persen_stunting;
                        LokusStunting = stunting2020[i].lokus_stunting;
                        Tahun = stunting2020[i].tahun;
                        // statusKawasan = sites[i].status_kawasan;
                        // no_kk2 = penduduk[i].no_kk;
                        // console.log(BalitaStunting);
                    }
                    }


                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Persentase Stunting : " + BalitaStunting + '%' +
                            "</li><li class='list-group-item'>Tingkat : " + PersenStunting  +
                            "</li><li class='list-group-item'> " + LokusStunting  +
                            "</li><li class='list-group-item'>Tahun : " + Tahun  
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var stunting2020 = {!! json_encode($stunting_2020) !!};
                    for (let i = 0; i < stunting2020.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting2020[i].desa_id == feature.properties.kode_desa) {
                        // PersenStunting = stunting[i].persen_stunting;
                        LokusStunting2020 = stunting2020[i].lokus_stunting;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: tahunStunting2020(LokusStunting2020),
                    fillColor: tahunStunting2020(LokusStunting2020)
                }
                    }
                    
                }
                
                ).addTo(stunting2020);
                map.fitBounds(layer.getBounds());
            })


        


            // layer controller
            var baseMaps = {
                "OSM": osm,
                "Google Street": googleStreets,
                "Google Sattelite": googleSat,
            };

            var overlayMaps = {
                "Marker": marker,
                "Administrasi Wilayah": sambasAdm,
                "Desa Stunting 2019": stunting2019,
                "Desa Stunting 2020": stunting2020,
                
            };
            L.control.layers(baseMaps, overlayMaps, {
                collapsed: false,
                position: 'topright'
            }).addTo(map);

            //legend dgn gambar
            /*Legend specific*/
            var legend1 = L.control({ position: "bottomright" });





            legend1.onAdd = function(map) {
            var div = L.DomUtil.create("div", "legend");
            div.innerHTML += "<h4>Info</h4>";
            div.innerHTML += '<i style="background: blue"></i><span>Desa</span><br>';
            div.innerHTML += "<hr>";
            div.innerHTML += "<h4>Tingkat Stunting</h4>";
            div.innerHTML += '<i style="background: green"></i><span>Rendah</span><br>';
            div.innerHTML += '<i style="background: orange"></i><span>Sedang</span><br>';
            div.innerHTML += '<i style="background: red"></i><span>Tinggi</span><br>';
            div.innerHTML += '<i style="background: black"></i><span>Sangat Tinggi</span><br>';
            // div.innerHTML += '<i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>Grænse</span><br>';
            return div;
            };

            legend1.addTo(map);

            const legend = L.control.Legend({
            position: "bottomleft",
            collapsed: false,
            symbolWidth: 50,
            symbolHeight: 25,
            opacity: 1,
            column: 2,
            legends: [{
                label: "Tingkat Stunting 2019",
                type: "image",
                layers: [tingkat2019], 
                url : "https://cdn-icons-png.flaticon.com/512/5948/5948099.png",
                inactive: true,
            },{
                label: "Tingkat Stunting 2020",
                type: "image",
                layers: [tingkat2020], 
                url : "https://cdn-icons-png.flaticon.com/512/4946/4946864.png",
                inactive: true,
            },
             {
                label: "Marker",
                type: "image",
                layers: [marker], 
                url: "{{asset('image/purple.png')}}"
            }]
        })
        .addTo(map);
                        
            
        </script>
@endpush
