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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    .alert-success {
        display: inline-block;
        background-color: green;
        color: white;
        padding: 5px 10px;
        margin-bottom: 20px;
        border-radius: 2px;
    }

    .alert-danger {
        display: inline-block;
        background-color: red;
        color: white;
        padding: 5px 10px;
        margin-bottom: 20px;
        border-radius: 2px;
    }
</style>

<body>

    <div class="container d-flex flex-column align-items-center justify-content-center gap-3">
        <h1 class="text-center">PHP CRUD</h1>


        <?php
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
        ?>
                <div class="alert alert-success">Message submitted successfully</div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger">Message submition failed</div>
        <?php
            }
        }
        ?>

        <form action="./handler/1_class2_handler.php" method="post" class="w-50">
            <div class="form-group my-3">
                <label for="">Name: </label>
                <input type="text" class="form-control" name="full_name" id="">
            </div>
            <div class="form-group my-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="">
            </div>
            <div class="form-group my-3">
                <label for="">Phone No.</label>
                <input type="tel" class="form-control" name="pnumber" id="">
            </div>

            <div class="form-group my-3 ">
                <label for="">Gender</label> <br>
                <div class="form-check-inline">
                    <input type="radio" name="gender" id="male" class="form-check-input" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>

                <div class="form-check-inline">
                    <input type="radio" name="gender" id="female" class="form-check-input" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>

                <div class="form-check-inline">
                    <input type="radio" name="gender" id="other" class="form-check-input" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <form type="get" class="d-flex gap-2">
            <input type="text" name="fullName" class="form-control">
            <button class="btn btn-info" type="submit" >Submit</button>
            <!-- <button class="btn btn-warning" >Reset</button> -->
        </form>



        <table class="table w-50 mt-5">
            
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                // $query = "SELECT `full_name`,`email` FROM `signup_subs`";
                // $query = "SELECT * FROM `signup_subs` WHERE `created_at`>'2026-03-13 00:00:00' AND  `created_at`<'2026-03-13 23:59:00'";
        
                $query = "SELECT * FROM `signup_subs`";
                
                if(isset($_GET['fullName'])){

                    $fullname = $_GET['fullName'];

                    $query = $query . "WHERE `full_name` LIKE '%$fullname%'";
                }


                $mysql = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($mysql)){
                    // echo "<pre>";
                    // print_r($row);
                ?>

                <tr>
                    <td><?php echo $row['id']??'' ?></td>
                    <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['pnumber']??'' ?></td>
                    <td><?php echo $row['gender']??'' ?></td>
                    <td><?php echo $row['created_at']??'' ?></td>
                </tr>
                <?php
                }

            ?>
         
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        let alert = document.querySelector('.alert');

        setTimeout(() => {
            alert.style.display = "none";
        }, 2000);
    </script>
</body>

</html>