
<?php

    $conn = new mysqli("localhost", "root", "", "db_1805551114");

    $return_arr = array();

    $select = "SELECT * FROM tb_datamap";

    $result = mysqli_query($conn,$select);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $lat = $row['lat'];
        $lng = $row['lng'];
        $katagori = $row['katagori'];
        $nama = $row['nama'];
        $deskripsi = $row['deskripsi'];
    
        $return_arr[] = array("id" => $id,"lat" => $lat, "lng" => $lng, "type"=>$katagori, "nama"=>$nama, "deskripsi"=>$deskripsi);
    }
    
    echo json_encode($return_arr);
    

    // if (mysqli_num_rows($select) > 0) {
    //     // output data of each row
    //     $panjang = mysqli_num_rows($select);
    //     for($i =0; $panjang>$i;$i++){
    //         while($row = mysqli_fetch_array($select)){
    //             $data["lat"] = $row["lat"];
    //             $data["lng"] = $row["lng"];
    //             $data["id"] = $row["id"];
    //         }
    //         echo json_encode($data);
    //     }
        
    // } else {
    //     echo "Tidak ada dat results";
    // }

    // while($row = mysqli_fetch_array($select)){
    //     $data["lat"] = $row["lat"];
    //     $data["lng"] = $row["lng"];
    //     print_r($data);
    // }
    
  


    
    
