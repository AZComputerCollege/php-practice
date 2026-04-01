<?php
    require "./conn.php";
    

    // AS = alias

    $query = "SELECT 
    p.*,
    cat.cname As category_name,
    subcat.cname As subcategory_name 
    FROM product As p INNER JOIN category As cat ON p.category_id=cat.id LEFT JOIN category As subcat ON p.subcategory_id = subcat.id";


    $sql = mysqli_query($conn, $query);
    
    $records = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    // $records = [];
    // while($row = mysqli_fetch_assoc($sql)){
    //     // print_r(array_merge($records, $row));
    //     $records[] = $row;
    // }


    echo json_encode(["status"=>200,"message"=>"Data Fetched Successfully","data"=>$records],200);
?>