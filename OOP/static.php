<?php
    class Calculator
         {
            static $amount = 200;
            static function add(float $num, float $num2){
                return $num+$num2;
            }

            static function subtract(float $num, float $num2){
                return $num-$num2;
            }

            static function multiply(float $num, float $num2){
                return $num*$num2;
            }

            static function devide(float $num, float $num2){
                return $num/$num2;
            }
         }
        //  echo Calculator::add(5,10);
         echo Calculator::$amount;

?>