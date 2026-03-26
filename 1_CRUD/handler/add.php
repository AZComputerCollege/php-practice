<?php

    include "./connection.php";

    if(isset($_POST) && !empty($_POST)){
        echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // echo "</pre>";  
        $response = [];
        $full_name = $_POST['full_name']??'';
        $email = $_POST['email']??'';
        $pnumber = $_POST['pnumber']??'';
        $gender = $_POST['gender']??'';
        $subjects = implode(',',$_POST['subject']);
        $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
        // $pic = mysqli_real_escape_string($conn, $_POST['profile_pic']);
        $picName = $_FILES['profile_pic']['name'];

        $ext = strtolower(pathinfo($picName, PATHINFO_EXTENSION));


        if(!in_array($ext, ['jpg', 'png','jpeg'])){
            $response = ['msg'=> "Data Insertion failed. Error: invalid file format", "success"=>false];
        }

        $newName = time().rand(1,100000).'.'.$ext;

        move_uploaded_file($_FILES['profile_pic']['tmp_name'], '../uploads/'.$newName);
    
        $created_at = date('Y-m-d h:m');

        if($full_name==''||$email==''||$pnumber==''||$gender==''){
            $response = ['msg'=> "Please fillout values correctly", "success"=>false];
               header("location:../1_class2.php?success=0");
               return;

        }

        $query = "INSERT INTO `signup_subs` (`full_name`, `email`, `pnumber`, `gender`,`profile_pic`,`subjects`,`teacher_id`,`created_at`) VALUES ('$full_name', '$email', '$pnumber', '$gender','$newName','$subjects','$teacher_id','$created_at')";

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