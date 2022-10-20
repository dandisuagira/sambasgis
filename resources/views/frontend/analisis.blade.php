@extends('template_frontend.master1')
@section('title','Peta Analisis')

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
                        <h2 class="text-center"><b>Peta Wilayah Sambas</b></h2>
                        {{-- {{$res['features']}} --}}
                        <div id="map" class="container"></div>  
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
        //join table desa 
        const desaController = <?= $desaController ?>;

        function objectClone(obj) {
            return JSON.parse(JSON.stringify(obj));
        }

        const DataDesa = objectClone(desaController);
        const Desaa = DataDesa.features
        // Inisialisasi MAP dasar  
        // osm map
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
        
        //url peta
        var wfs_url_adm = '{{asset('geojson/desa.geojson')}}';
        var wfs_url_pendidikan = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_sederajat_sambas_pt_50k_610120220828190649&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326';
        var wfs_url_bky = 'http://pontianakkota.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:indeks_banjir_pnk_inarisk_25k_617120220926102136&outputFormat=application%2Fjson'
        //kesehatan
        var wfs_url_kesehatan = "{{asset('geojson/kesehatan.geojson')}}"
        //puskesmas
        var wfs_url_puskesmas = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_puskesmas_sambas_pt_50k_610120220922062425&outputFormat=application%2Fjson';
        //rumah sakit
        var wfs_url_rumahsakit = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_rumahsakit_desa_sambas_pt_50k_610120220922062600&outputFormat=application%2Fjson';
        var wfs_url_sd = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:sd_desa_sambas_pt50k_610120220926083327&outputFormat=application%2Fjson';
        var wfs_url_smp = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:smp_desa_sambas_pt50k_610120220926083734&outputFormat=application%2Fjson';
        var wfs_url_sma = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:sma_smk_desa_sambas_pt50k_610120220926083614&outputFormat=application%2Fjson';
        var wfs_url_sederajat = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:sederajat_desa_sambas_pt50k_610120220926083458&outputFormat=application%2Fjson';
        
        
        //buat variabel penampung agar dapat overlay
        var sambasAdm = new L.layerGroup();
        var kesehatan = new L.layerGroup();
        var stuntingLayer = new L.layerGroup();
        //pendidikan
        var pendidikan = new L.layerGroup();


        //ICON
        
         ////icon laynan kesehatan
         var yellowIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/3448/3448513.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        ////icon puskesmas
        var puskesmasIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/3448/3448442.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        ////icon RS icon
        var rsIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/3448/3448436.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        //icon SD
        var sdIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/2602/2602414.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });
        //icon SMP
        var smpIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/167/167707.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });
        //icon SMA
        var smaIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/569/569025.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });
        //icon SEDERAJAT
        var sederajatIcon = new L.Icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/3171/3171493.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [35, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });





         //sambas adm 
         $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc 
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    l.addTo(map);         
                    },
                style : function(feature){
             
                return { 
                    opacity: 0.6,
                    color: 'blue',
                    fillColor: 'blue'
                }
                }
                    
                }
                
                ).addTo(sambasAdm);
                map.fitBounds(layer.getBounds());
            })


    //KESEHATAN DIGABUNG
    //laynaan kesehatan (Posyandu,polindes) + join dgn layer desa dari controller (sukses) 
    $.getJSON(wfs_url_kesehatan, function(data) {
        L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                // L.marker(feature.geometry.y, feature.geometry.x, {
                return L.marker(latlng, {
                    icon: yellowIcon

                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);
            }
        }).addTo(kesehatan);
        });


      
      
              //laynaan puskesmas + join dgn layer desa dari controller (sukses) 
     
        $.getJSON(wfs_url_puskesmas, function(data) {
        L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                // L.marker(feature.geometry.y, feature.geometry.x, {
                return L.marker(latlng, {
                    icon: puskesmasIcon

                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);
            }
        }).addTo(kesehatan);
        });


        //rumah sakit + join dgn layer desa dari controller (sukses) 
        $.getJSON(wfs_url_rumahsakit, function(data) {
        L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                // L.marker(feature.geometry.y, feature.geometry.x, {
                return L.marker(latlng, {
                    icon: rsIcon

                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);
            }
        }).addTo(kesehatan);
        });
       
    
    
    
        //pendidikan gabung
         //SD 
         $.getJSON(wfs_url_sd, function(data) {
            L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                  return L.marker(latlng, {
                    icon: sdIcon
                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);

            }

        }).addTo(pendidikan);
        });

          //SMP 
          $.getJSON(wfs_url_smp, function(data) {
            L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                  return L.marker(latlng, {
                    icon: smpIcon
                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);

            }

        }).addTo(pendidikan);
        });

          //SMA 
          $.getJSON(wfs_url_sma, function(data) {
            L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                  return L.marker(latlng, {
                    icon: smaIcon
                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);

            }

        }).addTo(pendidikan);
        });

          //SEDERAJAT 
          $.getJSON(wfs_url_sederajat, function(data) {
            L.geoJSON(data, {
            pointToLayer: function(feature, latlng) {
                  return L.marker(latlng, {
                    icon: sederajatIcon
                });
            },
            onEachFeature(feature, layer) {
                for (let i = 0; i < Desaa.length; i++) {
                    // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
                    if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
                        Nama_Desaa = Desaa[i].properties.namobj;
                        Kecamatan = Desaa[i].properties.wiadkc;
                    }
                }
                var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'> " + feature.properties.namobj +
                            "</h6></li><li class='list-group-item'>Jenis : " + feature.properties.remark +
                            "</h6></li><li class='list-group-item'>Desa : " + Nama_Desaa +
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan 

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);

            }

        }).addTo(pendidikan);
        });
       
    
        //warna berdasarkan tingkat stunting
    function getColorDB(d) {
        return (d) == 'RENDAH' ? 'GREEN' :
            (d) == 'SEDANG' ? 'ORANGE' :
            (d) == 'TINGGI' ? 'RED' :
            'BLACK';
    }

        //STUNTING
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var stunting = {!! json_encode($stunting) !!};
                    // console.log(stunting)
                    for (let i = 0; i < stunting.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (stunting[i].desa_id == f.properties.kode_desa) {
                        BalitaStunting = stunting[i].balita_stunting;
                        PersenStunting = stunting[i].persen_stunting;
                        LokusStunting = stunting[i].lokus_stunting;
                        Tahun = stunting[i].tahun;

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
                    var stunting = {!! json_encode($stunting) !!};
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
                
                ).addTo(stuntingLayer);
                map.fitBounds(layer.getBounds());
            })
            
            
        // var wfs_url_ptk = 'http://pontianakkota.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:indeks_banjir_pnk_inarisk_25k_617120220926102136&outputFormat=application%2Fjson'
        // $.getJSON(wfs_url_ptk, function(data) {
        // penduduk = L.geoJson(data, {
        //     style: function(feature) {
        //         return {
        //             opacity: 1,
        //             color: 'blue',
        //             fillColor: 'blue'
        //         }

        //     },
        //     onEachFeature(feature, layer) {
        //         layer.bindPopup("Id: " + feature.properties.id);
        //         }
        //     }).addTo(map);
        // });

            // layer controller
            var baseMaps = {
                "OSM": osm,
                "Google Street": googleStreets,
                "Google Sattelite": googleSat,
            };

            var overlayMaps = {
                "Marker": marker,
                "Layanan Kesehatan": kesehatan,
                "Fasilitas Pendidikan": pendidikan,
                "Desa Stunting": stuntingLayer,
                
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
            // div.innerHTML += "<hr>";
            // div.innerHTML += "<h4>Tingkat Stunting</h4>";
            // div.innerHTML += '<i style="background: green"></i><span>Rendah</span><br>';
            // div.innerHTML += '<i style="background: orange"></i><span>Sedang</span><br>';
            // div.innerHTML += '<i style="background: red"></i><span>Tinggi</span><br>';
            // div.innerHTML += '<i style="background: black"></i><span>Sangat Tinggi</span><br>';
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
                label: "Batas Desa",
                type: "image",
                layers: [sambasAdm], 
                url : "https://cdn-icons-png.flaticon.com/512/5948/5948099.png",
                inactive: true,
            },{
                label: "Pendidikan",
                type: "image", 
                layers: [pendidikan], 
                inactive: true,
                url: "https://cdn-icons-png.flaticon.com/512/569/569025.png",
            },{
                label: "Kesehatan",
                type: "image", 
                layers: [kesehatan], 
                inactive: true,
                url: "https://cdn-icons-png.flaticon.com/512/3448/3448436.png",
            },{
                label: "Marker",
                type: "image",
                layers: [marker], 
                url: "{{asset('image/purple.png')}}"
            }]
        })
        .addTo(map);
                        

        </script>
@endpush

{{-- // GetCapabilitiesRequest
// http://localhost:8080/geoserver/wfs?service=wfs&version=1.1.0&request=GetCapabilities

// dapatkan data per nama geoserver
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=DescribeFeatureType&typeNames=bengkayang:batas_adm_bengkayang

//get feature per layer dgn format geojson
// http://localhost:8080/geoserver/wfs?service=wfs&version=2.0.0&request=GetFeature&typeNames=bengkayang:batas_adm_bengkayang&outputFormat=application/json --}}