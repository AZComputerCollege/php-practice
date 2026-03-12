<?php
    $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "form_submission";
    $port = 3306;

    $conn = mysqli_connect($hostname, $username, $password, $database, $port);
    if(!$conn){
        echo "Connection Failed. Error: ". mysqli_connect_error($conn);
        die(); 
    }
    
