<?php

    class vehicle
    {
        public function start(String $model){
            echo '<h1>'.$model.' Engine Starting</h1>';
        }

         public function stop(){
            echo "<h1>Engine Stopping</h1>";
        }
    }     


    $car = new vehicle();
    $car->start("Mehran");
    $car->stop();

?>
