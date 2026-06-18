<?php
     abstract class Machine
     {
        abstract public function pressStartButton();
        protected function brewCoffee(){
            echo 'brewing coffee from machine';
        }

        protected function fillingCup(){
            echo 'Filling your cup';
        }

        protected function stoppingCompressor(){
            echo 'Cup is filled, Work Done!';
        }
        protected function stop(){
            echo 'Stopping machine';
        }

     }

     class CoffeeMachine extends Machine{
        public function pressStartButton()
        {
          echo 'Starting Coffee Machine';
          $this->brewCoffee();
          echo "<br>";
          $this->fillingCup();
          echo "<br>";
          $this->stoppingCompressor();
          echo "<br>";
          $this->stop();
          echo "<br>";
        }
     }

     class TeaMachine extends Machine{
        public function pressStartButton()
        {
          echo 'Starting Tea Machine';
          $this->brewCoffee();
          echo "<br>";
          $this->fillingCup();
          echo "<br>";
          $this->stoppingCompressor();
          echo "<br>";
          $this->stop();
          echo "<br>";
        }
     }


     $obj = new CoffeeMachine;
     $tea = new TeaMachine;
     $obj->pressStartButton();
     $tea->pressStartButton();


?>