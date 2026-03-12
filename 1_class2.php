<?php
   include "./handler/connection.php";
    // if(isset($_GET) && !empty($_GET)){
    //     echo "<pre>";
    //     print_r($_GET);
    //     echo "</pre>";
    // }

    // if(isset($_GET['response'])){
    //     $response =  json_decode($_GET['response']);

    //     print_r($response);
    // }

    // if(isset($_GET['success'])){
    //   echo $_GET['success'];
    // }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .alert-success{
        display: inline-block;
        background-color: green;
        color: white;
        padding: 5px 10px;
        margin-bottom: 20px;
        border-radius: 2px;
    }

    .alert-danger{
        display: inline-block;
        background-color: red;
        color: white;
        padding: 5px 10px;
        margin-bottom: 20px;
        border-radius: 2px;
    }
</style>

<body>
    <h1>Class 2</h1>


    <?php 
    if(isset($_GET['success'])){
        if($_GET['success']==1){
    ?>
            <div class="alert alert-success">Message submitted successfully</div>
    <?php
        }
    else{
    ?>
            <div class="alert alert-danger">Message submition failed</div>
    <?php
        }
    }
    ?>
       

    <form action="./handler/1_class2_handler.php" method="post">
        <div class="form-group">
            <label for="">Name: </label>
            <input type="text" name="full_name" id="">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>
        <div class="form-group">
            <label for="">Phone No.</label>
            <input type="tel" name="pnumber" id="">
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <input type="radio" name="gender" id="male" value="male"><label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female"><label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other"><label for="other">Other</label>
        </div>

        <button type="submit">Submit</button>
    </form>


    <script>
        let alert = document.querySelector('.alert');

        setTimeout(() => {
            alert.style.display = "none";
        }, 2000);
    </script>
</body>
</html>