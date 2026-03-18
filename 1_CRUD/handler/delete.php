<?php

    include "./connection.php";

    if(isset($_GET) && !empty($_GET)){
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";  
        $id = $_GET['id'];

        $query = "DELETE FROM `signup_subs` WHERE `id`='$id'";

        if(mysqli_query($conn, $query)){
            $response = ['msg'=> "Data Deleted Successfully", "success"=>true];
        }else{
            $error = mysqli_error($conn);
            $response = ['msg'=> "Data Deletion failed. Error: $error", "success"=>false];
        }

        // $response = json_encode($response);
        $is_success = $response['success'];
        header("location:../list.php?delete-success=$is_success");
    }
?>