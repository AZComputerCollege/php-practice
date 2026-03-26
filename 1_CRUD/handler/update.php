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
        $subjects = implode(',',$_POST['subject']);
        $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
        $picName = $_FILES['profile_pic']['name'];
        $query = "SELECT profile_pic FROM signup_subs WHERE id = $id";
        $sql = mysqli_query($conn, $query);
        $record = mysqli_fetch_row($sql);
        $new_profile_pic = $record[0];

        if($picName){
            
            $ext = strtolower(pathinfo($picName, PATHINFO_EXTENSION));

            if(!in_array($ext, ['jpg', 'png','jpeg'])){
                $response = ['msg'=> "Data Insertion failed. Error: invalid file format", "success"=>false];
            }
            
            $new_profile_pic = time().rand(1,100000).'.'.$ext;

            move_uploaded_file($_FILES['profile_pic']['tmp_name'], '../uploads/'.$new_profile_pic);

            if(file_exists("../uploads/$record[0]")){
                unlink("../uploads/$record[0]");
            }
        }

        // print_r($gender);

        $created_at = date('Y-m-d h:m');

        if($full_name==''||$email==''||$pnumber==''||$gender==''){
            $response = ['msg'=> "Please fillout values correctly", "success"=>false];
               header("location:../create.php?success=0");
               return;

        }

        // $query = "INSERT INTO `signup_subs` (`full_name`, `email`, `pnumber`, `gender`,`created_at`) VALUES ('$full_name', '$email', '$pnumber', '$gender','$created_at')";
        $query = "UPDATE `signup_subs` SET `full_name`='$full_name', `email`='$email', `pnumber`='$pnumber', `gender`='$gender' , `profile_pic`='$new_profile_pic', `subjects`='$subjects', `teacher_id`='$teacher_id' WHERE `id`='$id'";

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