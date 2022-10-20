@extends('template_frontend.master1')
@section('title','Luas Desa')

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
                        <h2 class="text-center"><b>LUAS DAN PRESENTASE WILAYAH</b></h2>
                        {{-- {{$res['features']}} --}}
                        <div id="map" class="container"></div>  
                        <canvas id="myChart" width="200" height="100"></canvas>
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

    {{-- chars JS LINK--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    {{-- chart JS Example --}}
    


    <script>
        // Inisialisasi MAP dasar  
        // osm map
        // const desaController = <?= $desaController ?>;
       

        // function objectClone(obj) {
        //     return JSON.parse(JSON.stringify(obj));
        // }

        // const DataDesa = objectClone(desaController);
        // const Desaa = DataDesa.features


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
        var wfs_url_bky = 'http://localhost:8080/geoserver/bengkayang/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=bengkayang%3Aadministrasi_kabupaten_ln_610720220822095811&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326'

        //buat variabel penampung agar dapat overlay
        var sambasAdm = new L.layerGroup();
        var sambasDesa = new L.layerGroup();


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
        
     //warna berdasarkan luas desa   
        function getColorDB(d) {
        return (d) < 10 ? 'grey' :
            (d) < 30 ? 'cyan' :
            (d) < 60 ? 'green' :
            (d) < 100 ? 'yellow' :
            'red';
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



        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var desa = {!! json_encode($datas) !!};
                    // console.log(desa);
                    for (let i = 0; i < desa.length; i++) {
                        // console.log(sites[i].kode_desa);
                        if (desa[i].kode_desa == f.properties.kode_desa) {
                            PrioritasDesa = desa[i].prioritas_desa;
                            LuasDesa = desa[i].luas_desa;
                            // statusKawasan = sites[i].status_kawasan;
                            // no_kk2 = penduduk[i].no_kk;
                            // console.log(LuasDesa);
                        }
                    }
                    
                    var dusun = {!! json_encode($dusun) !!};
                    // console.log(dusun);
                    for (let i = 0; i < dusun.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (dusun[i].desa_id == f.properties.kode_desa) {
                        JumlahDusun = dusun[i].jumlah_dusun;
                        NamaDusun = dusun[i].nama_dusun;

                        // statusKawasan = sites[i].status_kawasan;
                        // no_kk2 = penduduk[i].no_kk;
                        console.log(JumlahDusun);
                    }
                    }
                    

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Desa Prioritas : " + PrioritasDesa +
                            "</li><li class='list-group-item'>Luas : " + LuasDesa +'km²' +
                            "</li><li class='list-group-item'><a href='desa/" +
                            Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var desa = {!! json_encode($datas) !!};
                    for (let i = 0; i < desa.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (desa[i].kode_desa == feature.properties.kode_desa) {
                        LuasDesa = desa[i].luas_desa;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorDB(LuasDesa),
                    fillColor: getColorDB(LuasDesa)
                }
                    }
                    
                }
                
                ).addTo(sambasDesa);
                map.fitBounds(layer.getBounds());
            })
       

        //bky adm
        $.getJSON(wfs_url_bky).then((res) =>{
            var layer = L.geoJson(res).addTo(map);
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
                "Luas Desa": sambasDesa,
                
            };
            L.control.layers(baseMaps, overlayMaps, {
                collapsed: true,
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
            div.innerHTML += "<h4>Luas Desa</h4>";
            div.innerHTML += '<i style="background: grey"></i><span>< 10 km²</span><br>';
            div.innerHTML += '<i style="background: cyan"></i><span>< 30 km²</span><br>';
            div.innerHTML += '<i style="background: green"></i><span>< 60 km²</span><br>';
            div.innerHTML += '<i style="background: yellow"></i><span>< 100 km²</span><br>';
            div.innerHTML += '<i style="background: red"></i><span>> 100 km²</span><br>';
            // div.innerHTML += '<i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>Grænse</span><br>';
            return div;
            };

            legend1.addTo(map);

            const legend = L.control.Legend({
            position: "bottomleft",
            collapsed: false,
            symbolWidth: 24,
            opacity: 1,
            column: 2,
            legends: [{
                label: "Luas Desa",
                type: "circle",
                radius: 6,
                color: "blue",
                fillColor: "grey",
                fillOpacity: 0.4,
                layers: [sambasDesa], 
                weight: 4,
                inactive: true,
            }, {
                label: "Marker",
                type: "image",
                layers: [marker], 
                url: "{{asset('image/purple.png')}}"
            }]
        })
        .addTo(map);
                        
            
        </script>
@endpush
