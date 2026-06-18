<?php
     interface paymentGateway{
        public function initializePayment();
        public function withdrawPayment();
        public function depositPayment();
     }
        interface cashOnDelivery{
        public function intializeDelivery();
        public function shippingMethod();
     }

     class JazzCash implements paymentGateway,cashOnDelivery{
        public function initializePayment(){
            echo "initializing Jazzcash Payment";
        }
        public function withdrawPayment(){
            echo "Withdrawing Payment";
        }
        public function depositPayment(){
            echo "Depositing Payment";
        }
        public function intializeDelivery(){
            echo "Intializing Delivery";
        }
        public function shippingMethod(){
            echo "Shipping method of Delivery";
        }
     }

      class easypaisa implements paymentGateway,cashOnDelivery{
        public function initializePayment(){
            echo "initializing easypaisa Payment";
        }
        public function withdrawPayment(){
            echo "Withdrawing Payment";
        }
        public function depositPayment(){
            echo "Depositing Payment";
        }
        public function intializeDelivery(){
            echo "Intializing Delivery";
        }
        public function shippingMethod(){
            echo "Shipping method of Delivery";
        }
     }
?>