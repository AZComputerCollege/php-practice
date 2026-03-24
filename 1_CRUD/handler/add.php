<?php

    include "./connection.php";

    if(isset($_POST) && !empty($_POST)){
        echo "<pre>";
        // print_r($_POST);
        print_r($_FILES);
        echo "</pre>";  
die;
        $response = [];
        $full_name = $_POST['full_name']??'';
        $email = $_POST['email']??'';
        $pnumber = $_POST['pnumber']??'';
        $gender = $_POST['gender']??'';
        $subject = implode(',',$_POST['subject']);
        $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
        // $pic = mysqli_real_escape_string($conn, $_POST['profile_pic']);
        $pic = $_FILES['profile_pic']['name'];
        

        // move_uploaded_file()
        print_r($pic);

        // die;


        // print_r($gender);

        // die;
        $created_at = date('Y-m-d h:m');

        if($full_name==''||$email==''||$pnumber==''||$gender==''){
            $response = ['msg'=> "Please fillout values correctly", "success"=>false];
               header("location:../1_class2.php?success=0");
               return;

        }

        $query = "INSERT INTO `signup_subs` (`full_name`, `email`, `pnumber`, `gender`,`created_at`) VALUES ('$full_name', '$email', '$pnumber', '$gender','$created_at')";

        if(mysqli_query($conn, $query)){
            $response = ['msg'=> "Data Inserted Successfully", "success"=>true];
        }else{
            $error = mysqli_error($conn);
            $response = ['msg'=> "Data Insertion failed. Error: $error", "success"=>false];
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