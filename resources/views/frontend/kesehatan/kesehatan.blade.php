@extends('template_frontend.master1')
@section('title','KESEHATAN')

@push('css')
    <!--         {{-- leaflet css --}} -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    
    {{-- Lejen CSS --}} 
    <link rel="stylesheet" href="{{asset('legend/leaflet.legend.css')}}" />
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
                        <h2 class="text-center"><b>FASILITAS KESEHATAN</b></h2>
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
        // Inisialisasi MAP dasar  
        // osm map
        const desaController = <?= $desaController ?>;
        const kesehatanController = <?= $kesehatanController ?>;

        function objectClone(obj) {
            return JSON.parse(JSON.stringify(obj));
        }

        const DataDesa = objectClone(desaController);
        const Desaa = DataDesa.features
        // console.log(Desaa) 

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

        var wfs_url_adm = "{{asset('geojson/desa.geojson')}}"
        //var wfs_url_adm = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326';
        //var wfs_url_pendidikan = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_sederajat_sambas_pt_50k_610120220828190649&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326';
        //layanan kesehatan
        var wfs_url_kesehatan = "{{asset('geojson/kesehatan.geojson')}}"
        //puskesmas
        var wfs_url_puskesmas = "{{asset('geojson/puskesmas.geojson')}}"
        //rumah sakit
        var wfs_url_rumahsakit = "{{asset('geojson/rumahsakit.geojson')}}"
        //var wfs_url_bky = 'http://localhost:8080/geoserver/bengkayang/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=bengkayang%3Aadministrasi_kabupaten_ln_610720220822095811&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326'

        //buat variabel penampung agar dapat overlay
        var sambasAdm = new L.layerGroup();
        var kesehatan = new L.layerGroup();
        var puskesmas = new L.layerGroup();
        var rumahSakit = new L.layerGroup();

        
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

        
        function getColor(d) {
        return (d) == 'BERKEMBANG' ? '#570a0a' :
            (d) == 'TERTINGGAL' ? '#14dba9' :
            (d) == 'SANGAT TERTINGGAL' ? '#121211' :
            (d) == 'MANDIRI' ? '#fbff00' :
            (d) == 'MAJU' ? '#2fff00' :

            '##0a0d0c';
        }


        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {
                    
                    l.bindPopup("Nama Desa: " + f.properties.namobj +
                     "<br> Kode Desa: " + Math.ceil(f.properties.kode_desa)   
                    )
                    l.addTo(sambasAdm);  
                    },
                style : function(feature){
                   return { 
                    opacity: 0.9,
                    color: 'grey',
                    fillColor: 'blue'
                    // color: getColor(feature.properties.status_idm),
                    // fillColor: getColor(feature.properties.status_idm)
                }
                }
                    
                }
                
                ).addTo(map);
                map.fitBounds(layer.getBounds());
            })

 

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
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan +
                            "</li><li class='list-group-item'><a href='lakes/" +
                            feature.properties.objectid + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";
                            // "</li><li class='list-group-item'><a href='lakes/" +
                            // feature.properties.objectid + "/edit' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

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
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan +
                            "</li><li class='list-group-item'><a href='puskesmas/" +
                            feature.properties.objectid + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);
            }
        }).addTo(puskesmas);
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
                            "</h6></li><li class='list-group-item'>Kecamatan : " + Kecamatan +
                            "</li><li class='list-group-item'><a href='rumahsakit/" +
                            feature.properties.objectid + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                        layer.bindPopup(isPopup);
                        // layer.addTo(map);
            }
        }).addTo(rumahSakit);
        });
       


      
        



            // layer controller
            var baseMaps = {
                "OSM": osm,
                "Google Street": googleStreets,
                "Google Sattelite": googleSat,
            };

            var overlayMaps = {
                "Administrasi": sambasAdm,
                "Fasilitas Kesehatan": kesehatan,
                "Puskesmas": puskesmas,
                "Rumah Sakit": rumahSakit,
            };
            L.control.layers(baseMaps, overlayMaps, {
                collapsed: true,
                position: 'topright'
            }).addTo(map);
            

            const legend = L.control.Legend({
            position: "bottomleft",
            collapsed: false,
            symbolWidth: 50,
            symbolHeight: 25,
            opacity: 1,
            column: 2,
            legends: [{
                label: "Fasilitas Kesehatan",
                type: "image", 
                layers: [kesehatan], 
                inactive: true,
                url: "https://cdn-icons-png.flaticon.com/512/3448/3448513.png",
            },{
                label: "Puskesmas",
                type: "image", 
                layers: [puskesmas], 
                inactive: true,
                url: "https://cdn-icons-png.flaticon.com/512/3448/3448442.png",
            },{
                label: "Rumah Sakit",
                type: "image", 
                layers: [rumahSakit], 
                inactive: true,
                url: "https://cdn-icons-png.flaticon.com/512/3448/3448436.png",
            }
        ]
        })
        .addTo(map);


        var legend1 = L.control({ position: "bottomright" });

            legend1.onAdd = function(map) {
            var div = L.DomUtil.create("div", "legend");
            div.innerHTML += "<h4>Info</h4>";
            div.innerHTML += '<i style="background: grey"></i><span>Desa</span><br>';
            // div.innerHTML += '<i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>Grænse</span><br>';
            return div;
            };

            legend1.addTo(map);


        </script>
@endpush
