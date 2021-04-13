
<?php

    
    $conn = new mysqli("localhost", "root", "", "db_sig");

    $select = mysqli_query($conn,"SELECT * FROM tb_koordinat");

    $json_array = array();
    while($row = mysqli_fetch_assoc($select)){
        $json_array = $row;
    }
    echo(json_encode($json_array));
    mysqli_close($conn);
    
    
    

    // if (mysqli_num_rows($select) > 0) {
    //     // output data of each row
    //     $panjang = mysqli_num_rows($select);
    //     for($i =0; $panjang>$i;$i++){
    //         while($row = mysqli_fetch_array($select)){
    //             $data->lat = $row["lat"];
    //             $data->lng = $row["lng"];
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
    
  


    
    
