@extends('template_frontend.master1')
@section('title','Penduduk')

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
                        <h2 class="text-center"><b>SEBARAN PENDUDUK</b></h2>
                        {{-- {{$res['features']}} --}}
                        <div id="map" class="container"></div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
     <!-- Portfolio section -->
 


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

        var wfs_url_adm = "{{asset('geojson/desa.geojson')}}"
        //var wfs_url_adm = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326';
        var wfs_url_pendidikan = 'http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_sederajat_sambas_pt_50k_610120220828190649&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326';
        var wfs_url_bky = 'http://localhost:8080/geoserver/bengkayang/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=bengkayang%3Aadministrasi_kabupaten_ln_610720220822095811&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326'

        //buat variabel penampung agar dapat overlay
        var sambasAdm = new L.layerGroup();
        var sambasPenduduk = new L.layerGroup();
        var smp = new L.layerGroup();

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


 


        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {
                    l.bindPopup("Nama Desa: " + f.properties.namobj +
                     "<br> Kode Desa: " + Math.ceil(f.properties.kode_desa)  + 
                     '<br>' + "Nama Kecamatan: " + f.properties.wiadkc  
                     )
                    l.addTo(map)  
                    },
                style : function(feature){
                   return { 
                    opacity: 0.9,
                    color: 'blue',
                    fillColor: 'black'
                }
                }                   
                }                
                ).addTo(sambasAdm);
                map.fitBounds(layer.getBounds());
            })


           
        //warna berdasarkan banyak jumlah penduduk
        function getColorDB(d) {
            return (d) < 2000 ? 'grey' :
                (d) < 3000 ? 'cyan' :
                (d) <= 5000 ? 'green' :
                (d) <= 10000 ? 'yellow' :
                'red';
        }

        //DUSUN DENGAN KLASIFIKASI BANYAK JUMLAH! & WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var desa = {!! json_encode($datas) !!};
                    for (let i = 0; i < desa.length; i++) {
                        // console.log(sites[i].kode_desa);
                        if (desa[i].kode_desa == f.properties.kode_desa) {
                            // statusKawasan = sites[i].status_kawasan;
                            // no_kk2 = penduduk[i].no_kk;
                            // console.log(LuasDesa);
                        }
                    }

                    var penduduk = {!! json_encode($penduduks) !!};
                    for (let i = 0; i < penduduk.length; i++) {
                        // console.log(sites[i].kode_desa);
                        if (penduduk[i].desa_id == f.properties.kode_desa) {
                            Id = penduduk[i].id;
                            LakiLaki = penduduk[i].laki_laki;
                            Perempuan = penduduk[i].perempuan;
                            JumlahPenduduk = penduduk[i].jumlah;
                            SexRatio = penduduk[i].sex_ratio;
                        }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Laki-Laki : " + LakiLaki +
                            "</li><li class='list-group-item'>Perempuan : " + Perempuan +
                            "</li><li class='list-group-item'>Jumlah : " + JumlahPenduduk +
                            "</li><li class='list-group-item'>Sex Ratio : " + SexRatio 
                            // "</li><li class='list-group-item'><a href='penduduk/" +
                            // Id + "/edit' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    },
                style : function(feature){
                    var penduduk = {!! json_encode($penduduks) !!};
                    for (let i = 0; i < penduduk.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (penduduk[i].desa_id == feature.properties.kode_desa) {
                        JumlahPenduduk = penduduk[i].jumlah;
                        // console.log(JumlahPenduduk)
                        }
                    }

                   return { 
                    opacity: 0.9,
                    color: getColorDB(JumlahPenduduk),
                    fillColor: getColorDB(JumlahPenduduk)
                    // color: getColor(feature.properties.status_idm),
                    // fillColor: getColor(feature.properties.status_idm)
                }
                    }
                    
                }
                
                ).addTo(sambasPenduduk);
                map.fitBounds(layer.getBounds());
            })

        //test sd join bg lidan  OK 
        // $.getJSON(wfs_url_pendidikan, function(data) {
        // L.geoJSON(data, {
        //     pointToLayer: function(feature, latlng) {
        //         // L.marker(feature.geometry.y, feature.geometry.x, {
        //         return L.marker(latlng, {
        //             icon: yellowIcon

        //         });
        //     },
        //     onEachFeature(feature, layer) {
        //         for (let i = 0; i < Desaa.length; i++) {
        //             // console.log(penduduk[i].id_bangunan); Math.ceil(f.properties.kode_desa)
        //             if (Math.ceil(Desaa[i].properties.kode_desa) == Math.ceil(feature.properties.kode_desa)) {
        //                 Nama_Desaa = Desaa[i].properties.namobj;
        //                 Status = Desaa[i].properties.status_idm;
        //             }
        //         }
        //         layer.bindPopup("Nama Sekolah : " + feature.properties.namobj +
        //             "<br> Jenjang : " + feature.properties.remark +
        //             "<br>Desa : " + Nama_Desaa +
        //             "<br> Status Desa : " + Status   
        //             );
        //     }

        
        // }).addTo(smp);
        // });
       

        //bky adm
        $.getJSON(wfs_url_bky).then((res) =>{
            var layer = L.geoJson(res).addTo(map);
            map.fitBounds(layer.getBounds());
        })

      
        
        //datas desa dari mysql
        // var array = [];
        //     <?php foreach ($datas as $key=>$value) { ?>
        //     var myStyle = {
        //         "color" : 'red',
        //         "fillColor" : 'green',
        //         "weight": 1,
        //         "opacity": 5
        //     };
        //     var drawnItems = L.geoJson(<?php echo $value->geojson_desa; ?> {
        //         style: myStyle
        //     }).bindPopup(
        //         '<table class="table table-hover table-responsive table-info table-sm"><h4 class="text-center">Detail Desa</h4><hr><tr><td class="bg-primary">Nama Desa</td><td><?= $value->nama_desa ?></td></tr><tr><td class="bg-primary">Kode Desa</td><td><?= $value->kode_desa ?></td></tr><tr><td class="bg-primary">Kecamatan</td><td><?= $value->kecamatan ?></td></tr><tr><td class="bg-primary">Status Desa Prioritas</td><td><?= $value->prioritas_desa ?></td></tr><tr><a href="google.com" class="btn bg-secondary text-light">Detail Desa</a></tr></table>'
        //         )
        //     array.push(drawnItems);
        //     <?php }; ?>
        //     var datas = L.featureGroup(array).addTo(map);


            // layer controller
            var baseMaps = {
                "OSM": osm,
                "Google Street": googleStreets,
                "Google Sattelite": googleSat,
            };

            var overlayMaps = {
                "Marker": marker,
                "Desa": sambasAdm,
                "Penduduk": sambasPenduduk,
                
            };
            L.control.layers(baseMaps, overlayMaps, {
                collapsed: true,
                position: 'topright'
            }).addTo(map);
            

           //warna berdasarkan banyak jumlah penduduk
        // function getColorDB(d) {
        //     return (d) < '2000' ? 'grey' :
        //         (d) < '3000' ? 'cyan' :
        //         (d) <= '5000' ? 'green' :
        //         (d) <= '10000' ? 'yellow' :
        //         'red';
        // }

            //legend
            var legend1 = L.control({ position: "bottomright" });

                legend1.onAdd = function(map) {
                var div = L.DomUtil.create("div", "legend");
                div.innerHTML += "<h4>Info</h4>";
                div.innerHTML += '<i style="background: blue"></i><span>Desa</span><br>';
                // div.innerHTML += '<i style="background: green"></i><span>Penduduk</span><br>';
                div.innerHTML += "<hr>";
                div.innerHTML += "<h4>Jumlah Penduduk</h4>";
                div.innerHTML += '<i style="background: grey"></i><span>< 2000</span><br>';
                div.innerHTML += '<i style="background: cyan"></i><span>< 3000</span><br>';
                div.innerHTML += '<i style="background: green"></i><span>< 5000</span><br>';
                div.innerHTML += '<i style="background: yellow"></i><span>< 10000</span><br>';
                div.innerHTML += '<i style="background: red"></i><span>> 10000 </span><br>';
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
                        label: "Sebaran Penduduk",
                        type: "image",
                        layers: [sambasPenduduk], 
                        url : "https://cdn-icons-png.flaticon.com/512/1921/1921935.png",
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
