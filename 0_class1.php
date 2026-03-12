<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Class 1</title>
</head>
<body>
    <h1>Php Class 1</h1>

    <?php
        $accountNo = "123";
        $userName = "aslam";
        $age = 11;

        $arr = [1,2,3,4,5,6,7,8,9,"Aslam","Junaid","Kamran",10];
        // $aslam = "MyNameValue";
        
    ?>


    <!-- <h1>Name: <?php print $userName;?></h1> -->


    <!-- <pre>Name: <?php print_r ($arr);?></pre> -->


<!-- 
    <?php
         if($age<18){
    ?>
        <h1>Your Age is below 18</h1>
    <?php
         }
         else if($age<=18){        
    ?>
        <h1>You are eligible for driving</h1>

    <?php
         }
    ?> -->





    <?php
        //  if($age<18){
        //     echo "<h1>Your Age is below 18</h1>";
        //  }else if($age>=18){
        //     echo "<h1>You are eligible for driving</h1>";
        //  }
    ?>



    <?php
        $msg ='';
         if($age<18){
            // echo "<h1>Your Age is below 18</h1>";
            $msg = "Your Age is below 18";
         }else if($age>=18){
            $msg = "You are eligible for driving";
            // echo "<h1>You are eligible for driving</h1>";
         }else{
            $msg = "Undefined value";
         }
    ?>

    <!-- <h1><?php echo $msg;?></h1> -->


    <?php
        // for ($i=0; $i < 10; $i++) { 
        //     // echo "<p>$i</p>";
        //     echo '<p>'.$i.'</p>';
        // }
    ?>



    <?php
        foreach ($arr as $key => $value) {
            echo "key = $key and value = $value <br><br>";
        }
    ?>

        

</body>
</html>