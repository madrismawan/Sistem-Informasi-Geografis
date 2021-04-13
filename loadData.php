
<?php

    $conn = new mysqli("localhost", "root", "", "db_sig");

    $select = $conn->query("SELECT * FROM tb_koordinat");

    

    if (mysqli_num_rows($select) > 0) {
        // output data of each row
        $panjang = mysqli_num_rows($select);
        for($i =0; $panjang>$i;$i++){
            while($row = mysqli_fetch_array($select)){
                $data["lat"] = $row["lat"];
                $data["lng"] = $row["lng"];
            }
            echo json_encode($data);
        }
        
    } else {
        echo "Tidak ada dat results";
    }

    // while($row = mysqli_fetch_array($select)){
    //     $data["lat"] = $row["lat"];
    //     $data["lng"] = $row["lng"];
    //     print_r($data);
    // }
    
  


    
    
