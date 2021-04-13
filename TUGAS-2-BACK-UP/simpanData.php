<?php

  $conn = new mysqli("localhost", "root", "", "db_sig");
  
  $conn->query("INSERT INTO tb_koordinat VALUES (0,'$_POST[lat]','$_POST[lng]','$_POST[zoom]')");

  echo "Data Berhasil Di Simpan ke dalam Database";

  
?>

  
