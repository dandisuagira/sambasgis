@extends('template_frontend.master1')
@section('title','SEBARAN KAWASAN DESA')

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
                        <h2 class="text-center"><b>SEBARAN KAWASAN DESA</b></h2>
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
        var sambasAdm = new L.layerGroup(); //sambas ADM LAYER UTAMA

        var sambasDesa = new L.layerGroup();
        var stunting = new L.layerGroup();

        //kawasan
        var kabkota_sehat = new L.layerGroup();
        var ksk_ekonomi = new L.layerGroup();
        var ksk_trans_sda = new L.layerGroup();
        var kawasan_lindung = new L.layerGroup();
        var lokasi_desa = new L.layerGroup();
        var kawasan_agro = new L.layerGroup();


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
        
     //warna berdasarkan kabkota sehat
        function getColorDB(d) {
        return (d) == 'LOKASI KAB-KOTA SEHAT 2019' ? 'GREEN' :
            // (d) == 'SEDANG' ? 'ORANGE' :
            // (d) == 'TINGGI' ? 'RED' :
            'BLACK';
    }
     //warna berdasarkan ksk ekonimi
        function getColorKsk(d) {
        return (d) == 'KAW USAHA AGRIBISNIS TERPADU (KUAT),MINAPOLITAN PENANGKAPAN' ? 'orange' :
            (d) == 'KAW INDUSTRI SEMPARUK' ? 'orange' :
            (d) == 'KAW USAHA AGRIBISNIS TERPADU (KUAT)' ? 'orange' :
            (d) == 'MINAPOLITAN BUDIDAYA' ? 'orange' :
            (d) == 'KAW PERBATASAN NEGARA' ? 'orange' :
            'black';
    }
     //warna berdasarkan ksk transda
        function getColorKsTransSDA(d) {
        return (d) == 'KTM SUBAH' ? 'yellow' :
            (d) == 'KTM SUBAH (HINTERLAND)' ? 'yellow' :
            (d) == 'KTM GERMAS PERKASA' ? 'yellow' :
            (d) == 'KTM GERMAS PERKASA (HINTERLAND)' ? 'yellow' :
            (d) == 'KTM SUBAH (HINTERLAND), KTM GERMAS PERKASA (HINTERLAND)' ? 'yellow' :
            (d) == 'KTM GERMAS PERKASA (HINTERLAND), TERMINAL KHUSUS DAN KAWASAN INDUSTRI TANJUNG API' ? 'yellow' :
            'black';
    }
     //warna berdasarkan kawsan lindung
        function getColorKawasanLindung(d) {
        return (d) == 'Gunung Selindung' ? 'Aqua' :
            (d) == 'Gunung Sempadang' ? 'Aqua' :
            (d) == 'Tanjung Bila, Gunung Pemangkat' ? 'Aqua' :
            (d) == 'Gunung Dada Meribas, Sekadau, Majau, Pelanjau' ? 'Aqua' :
            (d) == 'Gunung Teberau, Gunung Sekadau' ? 'Aqua' :
            (d) == 'Gunung Majau' ? 'Aqua' :
            (d) == 'Tanjung Baharu' ? 'Aqua' :
            (d) == 'Gunung Senujuh' ? 'Aqua' :
            (d) == 'Gunung Bentarang, Sebunga, Senipis' ? 'Aqua' :
            (d) == 'Gunung Tanjung Datok dan Sungai Bemban' ? 'Aqua' :
            'black';
    }
    //warna berdasarkan lokasi desa
    function getColorLokasiDesa(d) {
        return (d) == 'PESISIR' ? 'Bisque' :
            'black';
        }
    
    //warna berdasarkan kawsan agro
    function getColorKawasanAgro(d) {
        return (d) == 'KAWASAN PENGEMBANGAN AGROTEKNOLOGI' ? 'Chartreuse' :
               (d) == 'KAWASAN MINAPOLITAN' ? 'Chartreuse' :
               (d) == 'KAW.USAHA AGROBISNIS TERPADU TEBAS' ? 'Chartreuse' :
               (d) == 'KAWASAN PENGEMBANGAN KTM' ? 'Chartreuse' :
               (d) == 'KAW.USAHA AGROBISNIS TERPADU GALING' ? 'Chartreuse' :
               'black';
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


 


        //sambas adm saja
        // $.getJSON(wfs_url_adm).then((res) =>{
        //     var layer = L.geoJson(res, {
        //         onEachFeature: function(f,l) {
        //             // console.log(res);
        //             l.bindPopup("Nama Desa: " + f.properties.namobj +
        //              "<br> Kode Desa: " + Math.ceil(f.properties.kode_desa)  + 
        //              '<br>' + "Nama Kecamatan: " + f.properties.wiadkc  
        //              ).addTo(sambasAdm)                      
        //             },
        //         style : function(feature){
        //            return { 
        //             opacity: 1,
        //             color: 'blue',
        //             fillColor: 'grey'
        //             }
        //         }
                    
        //         }
        //         ).addTo(map);
        //         map.fitBounds(layer.getBounds());
        //     })



        //sambas adm WITH DETAIL TO EDIT VIEW
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {
                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Kab/Kot Sehat : " + KabKotSehat + 
                            "</li><li class='list-group-item'>KSK Ekonomi : " + KskEkonomi  +
                            "</li><li class='list-group-item'>KSK SDA " + KskSda  +
                            "</li><li class='list-group-item'>Kawasan Lindung : " + KawasanLindung +  
                            "</li><li class='list-group-item'>Lokasi Desa : " + LokasiDesa +  
                            "</li><li class='list-group-item'>Kawasan Agro : " + KawasanAgro  
                            // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    l.addTo(sambasDesa);         
                    },
                style : function(feature){
                return { 
                    opacity: 0.9,
                    color: 'blue',
                    fillColor: 'blue'
                }
                }    
                }
                ).addTo(map);
                map.fitBounds(layer.getBounds());
            })


        //kabkot sehat
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Kab/Kota Sehat : " + KabKotSehat 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorDB(KabKotSehat),
                    fillColor: getColorDB(KabKotSehat)
                }
                }
                    
                }
                
                ).addTo(kabkota_sehat);
                map.fitBounds(layer.getBounds());
            })


        //	ksk_ekonomi
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>KSK Ekonomi : " + KskEkonomi 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorKsk(KskEkonomi),
                    fillColor: getColorKsk(KskEkonomi)
                }
                }
                    
                }
                
                ).addTo(ksk_ekonomi);
                map.fitBounds(layer.getBounds());
            })
       
        //	ksk_transSDA
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>KSK Trans SDA : " + KskSda 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        KskSda = kawasan[i].ksk_trans_sda;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorKsTransSDA(KskSda),
                    fillColor: getColorKsTransSDA(KskSda)
                }
                }
                    
                }
                
                ).addTo(ksk_trans_sda);
                map.fitBounds(layer.getBounds());
            })


        //	kawasan lindung
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Kawasan Lindung : " + KawasanLindung 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorKawasanLindung(KawasanLindung),
                    fillColor: getColorKawasanLindung(KawasanLindung)
                }
                }
                    
                }
                
                ).addTo(kawasan_lindung);
                map.fitBounds(layer.getBounds());
            })


        //	lokasi desa pesisir
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Lokasi Desa : " + LokasiDesa 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        LokasiDesa = kawasan[i].lokasi_desa;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorLokasiDesa(LokasiDesa),
                    fillColor: getColorLokasiDesa(LokasiDesa)
                }
                }
                    
                }
                
                ).addTo(lokasi_desa);
                map.fitBounds(layer.getBounds());
            })
       
        //	Kawasan Agro
        $.getJSON(wfs_url_adm).then((res) =>{
            var layer = L.geoJson(res, {
                onEachFeature: function(f,l) {

                    var kawasan = {!! json_encode($kawasan) !!};
                    // console.log(stunting)
                    for (let i = 0; i < kawasan.length; i++) {
                    // console.log(sites[i].kode_desa);
                    if (kawasan[i].desa_id == f.properties.kode_desa) {
                        KabKotSehat = kawasan[i].kabkota_sehat;
                        KskEkonomi = kawasan[i].ksk_ekonomi;
                        KskSda = kawasan[i].ksk_trans_sda;
                        KawasanLindung = kawasan[i].kawasan_lindung;
                        LokasiDesa = kawasan[i].lokasi_desa;
                        KawasanAgro = kawasan[i].kawasan_agro;
                    }
                    }

                    var isPopup =
                            "<li class='list-group-item active'><h6 class='text-white'>Desa " + f.properties.namobj +
                            "</h6></li><li class='list-group-item'>Kode Desa : " + Math.ceil(f.properties.kode_desa) +
                            "</li><li class='list-group-item'>Kecamatan : " + f.properties.wiadkc +
                            "</li><li class='list-group-item'>Kawasan Agro : " + KawasanAgro 
                           // "</li><li class='list-group-item'><a href='stunting/" +
                            // Math.ceil(f.properties.kode_desa) + "' 'type='button' class='btn btn-outline-primary btn-sm btn-block'>Detail</a></li>";

                    l.bindPopup(isPopup);
                    // l.addTo(map);         
                    },
                style : function(feature){
                    var kawasan = {!! json_encode($kawasan) !!};
                    for (let i = 0; i < kawasan.length; i++) {
                    if (kawasan[i].desa_id == feature.properties.kode_desa) {
                        KawasanAgro = kawasan[i].kawasan_agro;
                        }
                    }
                return { 
                    opacity: 0.9,
                    color: getColorKawasanAgro(KawasanAgro),
                    fillColor: getColorKawasanAgro(KawasanAgro)
                }
                }
                    
                }
                
                ).addTo(kawasan_agro);
                map.fitBounds(layer.getBounds());
            })
       



        //bky adm
        $.getJSON(wfs_url_bky).then((res) =>{
            var layer = L.geoJson(res).addTo(map);

        })

      
        


            // layer controller
            var baseMaps = {
                "OSM": osm,
                "Google Street": googleStreets,
                "Google Sattelite": googleSat,
            };

            var overlayMaps = {
                "Marker": marker,
                "Administrasi Wilayah": sambasDesa,
                "Kab/Kota Sehat": kabkota_sehat,
                "Ksk Ekomomi": ksk_ekonomi,
                "Ksk Trans SDA": ksk_trans_sda,
                "Kawasan Lindung": kawasan_lindung,
                "Lokasi Desa": lokasi_desa,
                "Kawasan Agro": kawasan_agro,
                
                
            };
            L.control.layers(baseMaps, overlayMaps, {
                collapsed: true,
                position: 'topright'
            }).addTo(map);

            //legend dgn gambar
            /*Legend specific*/
            var legend1 = L.control({ position: "bottomright" });


    //          //warna berdasarkan tingkat stunting
    //     function getColorDB(d) {
    //     return (d) == 'RENDAH' ? 'GREEN' :
    //         (d) == 'SEDANG' ? 'ORANGE' :
    //         (d) == 'TINGGI' ? 'RED' :
    //         'BLACK';
    // }


            legend1.onAdd = function(map) {
            var div = L.DomUtil.create("div", "legend");
            div.innerHTML += "<h4>Info</h4>";
            div.innerHTML += '<i style="background: blue"></i><span>Desa</span><br>';
            div.innerHTML += "<hr>";
            div.innerHTML += "<h4>Sebaran Kawasan Desa</h4>";
            div.innerHTML += '<i style="background: green"></i><span>Kab/Kota Sehat</span><br>';
            div.innerHTML += '<i style="background: orange"></i><span>KSK Ekonomi</span><br>';
            div.innerHTML += '<i style="background: yellow"></i><span>KSK Trans SDA</span><br>';
            div.innerHTML += '<i style="background: Aqua"></i><span>Kawasan Lindung</span><br>';
            div.innerHTML += '<i style="background: Bisque"></i><span>Lokasi Desa</span><br>';
            div.innerHTML += '<i style="background: Chartreuse"></i><span>Kawasan Agro</span><br>';
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
                label: "Kab/Kota Sehat",
                type: "image",
                layers: [kabkota_sehat], 
                url : "https://cdn-icons-png.flaticon.com/512/4006/4006511.png",
                inactive: true,
            }, {
                label: "KSK Ekonomi",
                type: "image",
                layers: [ksk_ekonomi], 
                url : "https://cdn-icons-png.flaticon.com/512/3258/3258570.png",
                inactive: true,
            }, {
                label: "KSK Trans SDA",
                type: "image",
                layers: [ksk_trans_sda], 
                url : "https://cdn-icons-png.flaticon.com/512/3322/3322068.png",
                inactive: true,
            }, {
                label: "Kawasan Lindung",
                type: "image",
                layers: [kawasan_lindung], 
                url : "https://cdn-icons-png.flaticon.com/512/685/685022.png",
                inactive: true,
            }, {
                label: "Lokasi Desa",
                type: "image",
                layers: [lokasi_desa], 
                url : "https://cdn-icons-png.flaticon.com/512/5948/5948099.png",
                inactive: true,
            }, {
                label: "Kawasan Agro",
                type: "image",
                layers: [kawasan_agro], 
                url : "https://cdn-icons-png.flaticon.com/512/2674/2674147.png",
                inactive: true,
            }, {
                label: "Marker",
                type: "image",
                layers: [marker], 
                url : "https://cdn-icons-png.flaticon.com/512/1397/1397898.png",
                inactive: true,
            }]
        })
        .addTo(map);
                        
            
        </script>
@endpush
