<?php

    include "./connection.php";

    if(isset($_POST) && !empty($_POST)){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";  

        $response = [];
        $full_name = $_POST['full_name']??'';
        $email = $_POST['email']??'';
        $pnumber = $_POST['pnumber']??'';
        $gender = $_POST['gender']??'';
        $id = $_GET['id'];
        // print_r($gender);

        // die;
        $created_at = date('Y-m-d h:m');

        if($full_name==''||$email==''||$pnumber==''||$gender==''){
            $response = ['msg'=> "Please fillout values correctly", "success"=>false];
               header("location:../create.php?success=0");
               return;

        }

        // $query = "INSERT INTO `signup_subs` (`full_name`, `email`, `pnumber`, `gender`,`created_at`) VALUES ('$full_name', '$email', '$pnumber', '$gender','$created_at')";
        $query = "UPDATE `signup_subs` SET `full_name`='$full_name', `email`='$email', `pnumber`='$pnumber', `gender`='$gender' WHERE `id`='$id'";

        if(mysqli_query($conn, $query)){
            $response = ['msg'=> "Data Updated Successfully", "success"=>true];
        }else{
            $error = mysqli_error($conn);
            $response = ['msg'=> "Data Updation failed. Error: $error", "success"=>false];
        }

        // $response = json_encode($response);
        $is_success = $response['success'];
        header("location:../list.php?success=$is_success");

        // print_r($response);
        // die;
    }
    

    // header("location: ../1_class2.php");
    // header();
    // exit();
    // die();

?>