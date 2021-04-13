<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Website Testing Sistem Geografis" content="">
    <meta name="Rismawan">
    <title>GIS Made Rismawan</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    

     <!-- embedd library jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- library Clustering Map -->
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js" integrity="sha512-WXoSHqw/t26DszhdMhOXOkI7qCiv5QWXhH9R7CgvgZMHz1ImlkVQ3uNsiQKu5wwbbxtPzFXd1hK4tzno2VqhpA==" crossorigin=""></script> 
    <link rel="stylesheet" href="Leaflet.markercluster-1.4.1/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css" />
	<script src="Leaflet.markercluster-1.4.1/dist/leaflet.markercluster-src.js"></script>

    <style>
        .SD  {
			width: 50px;
			height: 40px;
            position: absolute;
            border-radius: 25%;
			background-color: #A9A9A9;
			text-align: center;
			font-size: 24px;
            text-shadow: 0 1px 0 black, 0 -1px 0 black, 1px 0 0 black, -1px 0 0 black;
            color: white;
            font-size: 24px;
            text-transform: uppercase;
            text-align: center;
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.5);
		}

		.SMP  {
			width: 40px;
			height: 40px;
            position: absolute;
            border-radius: 25%;
            color: white;
			background-color: #9ACD32;
			text-align: center;
			font-size: 24px;
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.5);
		}

        .SMA  {
			width: 40px;
			height: 40px;
            position: absolute;
            border-radius: 25%;
			background-color: #E6E6FA;
			text-align: center;
			font-size: 24px;
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.5);
		}

	</style>


</head>

<body class="fix-header fix-sidebar card-no-border"> 
    <div id="main-wrapper">
        
        <!-- Bagian Atas pada header yang berisikan nama dan nim -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0"></ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" >1805551114 | I Made Rismawan Nugraha   </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Informasi Terkait Dengan Long,ltl -->
        <div class="page">
             <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0 center">Informasi Latitudes & Longitudes</h3>
                        <ol class="breadcrumb">
                            <li id="info" class="breadcrumb-item active">Koordinat :(.............. , .............)</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Judul di atas peta -->
                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Sistem Informasi Geografis Website</h4>
                                
                                <div id="gmaps"  style="height: 450px;"> </div>                             
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-block">
                                <h4 style="margin-bottom: 0px;" class="card-title">Informasi Detail Marker</h4>
                                <p class="mb-0">Klik marker untuk melihat info detail.</p>
                                <form >
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama Sekolah :</label>
                                        <input id="viewNama" type="text" placeholder="Nama Sekolah"  class="form-control"  disabled >
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Katagori Sekolah</label>
                                        <div class="mb-3">
                                            <select id="viewKatagori" class="form-control form-control-line" n disabled>
                                                <!-- <option value="PAUD">Paud</option> -->
                                                <option value="SD">SD</option>
                                                <option value="SMP" >SMP</option>
                                                <option value="SMA">SMA</option>
                                                <!-- <option value="Universitas">Universitas</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label  for="message-text" class="col-form-label">Deskripsi:</label>
                                        <textarea id="viewDeskripsi" name="deskripsi"placeholder="Deskripsi"  id="deskripsi" class="form-control" id="message-text" disabled></textarea>
                                    </div>
                                    <label for="recipient-name" class="col-form-label">Latitude & Longitude</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="viewLat" class="form-control" placeholder="Latitude"  disabled>                                                                           >
                                        <input type="text" id="viewLng" class="form-control" placeholder="Longitude"  disabled>
                                    </div>
                                    <div class="modal-footer" >
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Edit</button>
                                        <button type="submit" class="btn btn-light">Simpan</button>
                                    </div>
                                </form>                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" >
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Sekolah :</label>
                        <input name="nama" type="text" class="form-control" id="nama" >
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Katagori Sekolah</label>
                        <div class="mb-3">
                            <select class="form-control form-control-line" name="katagori" id="katagori">
                                <!-- <option value="PAUD">Paud</option> -->
                                <option value="SD">SD</option>
                                <option value="SMP" >SMP</option>
                                <option value="SMA">SMA</option>
                                <!-- <option value="Universitas">Universitas</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label  for="message-text" class="col-form-label">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" id="message-text"></textarea>
                    </div>
                    <label for="recipient-name" class="col-form-label">Latitude & Longitude</label>
                    <div class="input-group mb-3">
                        <input type="text" name="lat" id="lat" class="form-control" placeholder="Username" aria-label="Username" disabled>                                                                           >
                        <input type="text" name="lng" id="lng" class="form-control" placeholder="Server" aria-label="Server" disabled>
                    </div>
                    <div class="modal-footer" style="margin-top:40px;" >
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button id="btnsave" type="submit" class="btn btn-light">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>


        <!-- Bagian dari Script code pada peta workspace SIG -->
        <script type="text/javascript">
            
            $(document).ready(function(){
                
                //--------------START Deklarasi awal seperti icon pembuatan map-------------//
                var mymap = L.map('gmaps').setView([-8.606093, 115.173177], 12);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Adalah API Favoritku',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoibWFkZXJpc21hd2FuIiwiYSI6ImNrbGNqMzZ0dDBteHIyb21ydTRqNWQ4MXAifQ.YyTGDJLfKwwufNRVYUdvig'
                }).addTo(mymap);

                mymap.on('mousemove',function(e){
                    document.getElementById("info").innerHTML="Koordinat :("+e.latlng.lat+","+e.latlng.lng+")";
                });
                
                var icMarker = L.icon({
                    iconUrl: 'assets/images/icon/Asset2.png',
                    iconSize: [36, 40],
                    iconAnchor: [8 , 40],
                    popupAnchor: [12, -28],

                });      

                var SD = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            className: 'SD',
                            html: '<p>Sekolah Dasar</p>',
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                });

                var SMP = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            className: 'SMP',
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                })

                var SMA = L.markerClusterGroup({
                    maxClusterRadius:50,
                    zoomToBoundsOnClick:true,
                    
                    iconCreateFunction: function(cluster) {
                        return L.divIcon({ 
                            iconSize: [30.30],
                            iconAnchor: [15 , 30],
                            className: 'SMA',
                            html: '<b>' + cluster.getChildCount() + '</b>' 
                        });
                    }
                    
                });

                mymap.addLayer(SMA);
                mymap.addLayer(SMP);
                mymap.addLayer(SD);
                //--------------END Deklarasi awal seperti icon pembuatan map-------------//


                
               //--------------START Action Pada Map Website-------------//

                // show modal in action form add marker //
                mymap.on('click', function(e){
                    $('#lat').val(e.latlng.lat);
                    $('#lng').val(e.latlng.lng);
                    $('#exampleModal').modal('show');
                });

                // fungsi dari add marker dimana langusng aja di sini markernya add //
                function createMarker(latLng,id,type,nama,deskripsi){
                    var marker = L.marker(latLng,{
                                    icon : icMarker,
                                    id : id
                                }).bindPopup();
                    
                    // create pop up dan menampilkan info di form sebelah kanan map //
                    marker.on('click',function(e){
                        marker.setPopupContent(type.toString());
                        $('#viewNama').val(nama.toString());
                        $('#viewKatagori').val(type.toString());
                        $('#viewDeskripsi').val(deskripsi.toString());
                        $('#viewLat').val(latLng[0].toString());
                        $('#viewLng').val(latLng[1].toString());

                    });
                    
                    // Pemilihan Penentuan masuk cluster mana sebuah marker tersebut //
                    switch(type){
                        case "SMP":
                            SMP.addLayer(marker);
                            break;
                        case "SMA":
                            SMA.addLayer(marker);
                            break;
                        default:
                            SD.addLayer(marker);
                            break;
                    }
                }


                // fungsi load data dari php server dengan melakkan perulangan //
                $.ajax({
                    url : "./loadData.php",
                    type : "get",
                    dataType : "json",
                    success: function(response){
                        var len = response.length;
                        for(var i=0; i<len; i++){
                            createMarker([response[i].lat,response[i].lng],
                                response[i].id,
                                response[i].type,
                                response[i].nama,
                                response[i].deskripsi,
                                )
                        }
                    }

                });
                
                //ketika btnsave di teken maka dia akan nyimpen ke database
                $("#btnsave").click(function(){
                    var nama = $('#nama').val();
                    var katagori = $('#katagori').val();
                    var deskripsi = $('#deskripsi').val();
                    var lat = $('#lat').val();
                    var lng = $('#lng').val();
                        
                    $.ajax({
                        url: "simpanData.php",
                        type : "POST",
                        data : {
                            nama : nama,
                            katagori : katagori,
                            deskripsi : deskripsi,
                            lat : lat,
                            lng : lng
                        },
                        success :function(response){
                            alert(response);
                        }
                    });
                });
                
            });

        </script>    
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCUBL-6KdclGJ2a_UpmB2LXvq7VOcPT7K4&sensor=true"></script>
    <script src="assets/plugins/gmaps/gmaps.min.js"></script>
    <script src="assets/plugins/gmaps/jquery.gmaps.js"></script>
</body>

</html>