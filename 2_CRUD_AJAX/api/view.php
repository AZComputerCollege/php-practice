<?php
    require "./conn.php";
    
    $query = "SELECT * FROM product";
    $sql = mysqli_query($conn, $query);
    
    $records = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    // $records = [];
    // while($row = mysqli_fetch_assoc($sql)){
    //     // print_r(array_merge($records, $row));
    //     $records[] = $row;
    // }


    echo json_encode(["status"=>200,"message"=>"Data Fetched Successfully","data"=>$records],200);
?>