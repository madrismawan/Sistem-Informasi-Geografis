<?php

  $conn = new mysqli("localhost", "root", "", "db_1805551114");
  
  $conn->query("INSERT INTO tb_datamap VALUES (0,'$_POST[nama]','$_POST[katagori]','$_POST[deskripsi]','$_POST[lat]','$_POST[lng]')");

  echo "Data Berhasil Di Simpan ke dalam Database";

//   $nama=$_POST['nama'];
// 	$katagori=$_POST['katagori'];
// 	$deskripsi=$_POST['deskripsi'];
// 	$lat=$_POST['lat'];
//   $lng=$_POST['lng'];


// 	$sql = "INSERT INTO `tb_datamap`( `nama`, `katagori`, `deskripsi`, `lat`,`lng`) 
// 	VALUES ('$nama','$katagori','$deskripsi','$lat','$lng')";
// 	if (mysqli_query($conn, $sql)) {
// 		echo json_encode(array("statusCode"=>200));
// 	} 
// 	else {
// 		echo json_encode(array("statusCode"=>201));
// 	}
// 	mysqli_close($conn);
  
// ?>

  
