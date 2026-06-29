<?php
    require "./traits.php";
     class User{
        use LoggerTrait;
        public function output(){
            return "working";
        }
     }

     $obj = new User;
     $obj->setLogFile("test.txt");
     $obj->log("This is my helping");

?>