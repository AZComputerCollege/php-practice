<?php
require "./conn.php";

$action = $_GET['a'];

if($action == "fetchCategory"){
    $query = "SELECT * FROM category WHERE parent_id IS NULL";
    $sql = mysqli_query($conn, $query);
    
    $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    
    echo json_encode(["status"=>200, "message"=>"Data fetched successfully", "data"=>$data],200);
}
else if($action=="fetchSubcategory"){
    $category_id = $_GET['cat_id'];
    $query = "SELECT * FROM category WHERE parent_id = $category_id";
    $sql = mysqli_query($conn, $query);
    
    $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    
    echo json_encode(["status"=>200, "message"=>"Data fetched successfully", "data"=>$data],200);
}

?>