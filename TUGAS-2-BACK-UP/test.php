<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Website Testing Sistem Geografis" content="">
    <meta name="Rismawan">
    <title>GIS Made Rismawan</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

     <!-- embedd library jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


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
                        <h3 class="text-themecolor m-b-0 m-t-0">Informasi Latitudes & Longitudes</h3>
                        <ol class="breadcrumb">
                            <li id="info" class="breadcrumb-item active">Koordinat :(.............. , .............)</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Judul di atas peta -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Sistem Informasi Geografis Web dan Mobile</h4>
                                <div id="gmaps"  style="height: 450px;"> </div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-group">
                    <!-- <label for="">Latitude</label> -->
                    <!-- <input type="text" class="form-control" readonly id="lat" required> -->
                    <p id="lat" class="breadcrumb-item active">Koordinat :(.............. , .............)</p>
                </div>
                <div class="form-group">
                    <!-- <label for="">longtitude</label> -->
                    <p id="lng" class="breadcrumb-item active">Koordinat :(.............. , .............)</p>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveData" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div> 
        



        <!-- Bagian dari Script code pada peta workspace SIG -->
        <script type="text/javascript">
            
            $(document).ready(function(){
    
                var mymap = L.map('gmaps').setView([-8.606093, 115.173177], 13);

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
                

                mymap.on('dblclick', function(e){
                    document.getElementById("lat").innerHTML=(e.latlng.lat);
                    document.getElementById("lng").innerHTML=(e.latlng.lng);
                    $('#exampleModal').modal('show');
                });


                // Membuat Icon dengan gambar yang ada //
                var icMarker = L.icon({
                    iconUrl: 'assets/images/icon/Asset2.png',
                    iconSize: [36, 40],
                    iconAnchor: [8 , 40],
                    popupAnchor: [12, -28],

                });
                
                <?php
                    $conn = new mysqli("localhost", "root", "", "db_sig");
                    $query = "SELECT * FROM tb_koordinat";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($result)) {
                        addMarker($row['id'],$row['lat'],$row['lng']);
                    }
                    function addMarker($id,$lat, $lng){
                        $coordinate = $lat.",".$lng;
                            echo "
                                var marker$id = L.marker([$coordinate],{
                                    icon : icMarker    
                                }).addTo(mymap);";
                            echo "marker$id.bindPopup('Koordinat Lat & lng = $coordinate');";
                    }
                ?>


                            
                // Add marker pada map dengan custom icon //
                var home = L.marker([-8.606093, 115.173177],{
                    draggable: 'true',icon: myMarker
                }).addTo(mymap);

                // Add Pop Up pada map dengan marker yang telah di buat
                home.on('click',function(e){
                    marker.bindPopup("<b>Koordinat Tengah</b><br>Perumahan Cemara Giri Graha.").openPopup();
                    popup.openOn(mymap);
                })

                

                mymap.on('click',function(e){
        
                    var marker = L.marker(e.latlng,{
                        draggable: 'true',
                        icon: icMarker 
                    }).bindPopup().addTo(mymap);	

                    marker.on('click',function(e){
                        marker.setPopupContent(marker.getLatLng().toString());
                    });

                    // pengiriman data koordinat marker ke server
					markerData = {"lat":e.latlng.lat,"lng":e.latlng.lng,"zoom":mymap.getZoom()}
                    $.ajax({
        				url: "./simpanData.php",
        				type: "post",
        				data: markerData,
        				success: function (msg, status, jqXHR){
        					//respon pemanggilan ./saveToDatabase.php
        					alert(msg);	
        				}
    				});

                })
                
            });

        </script>    
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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