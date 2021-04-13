<?php

  $conn = new mysqli("localhost", "1805551114", "unud2019", "db_1805551114");
  
  $conn->query("INSERT INTO tb_koordinat VALUES (0,'$_POST[lat]','$_POST[lng]','$_POST[zoom]')");

  echo "Data Berhasil Di Simpan ke dalam Database";

  
?>

  
