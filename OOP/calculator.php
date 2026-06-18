
    <?php
         class Calculator
         {
            public $result=0;
            public function add(float $num){
                $this->result +=$num;
                return $this;
            }

            public function subtract(float $num){
                $this->result -=$num;
                return $this;
            }

            public function multiply(float $num){
                $this->result*=$num;
                return $this;
            }

            public function devide(float $num) {
                if($num>0){
                    $this->result/=$num;
                }
                return $this;
            }

            public function modulus(float $num){
                $this->result %=$num;
                return $this;
            }

            public function getResult(){
                return $this->result;
            }
            
            public function reset(){
                $this->result = 0;
                return $this;
            }
         }



         $obj = new Calculator();
         $result = $obj->add(5)->subtract(3)->multiply(3)->devide(2)->getResult();
         echo $result;
    ?>



    <!-- 
    Write a program with class BankAccount. Which will have four methods CreateAccount, Deposit, Withdraw and getAccountInfo.  
    -->

    <!-- 
    Create a pragram with class name User. Which will have methods for Signup, Signin, ForgetPassword, ResetPassword, ChangePassword, GetUser.
    -->




</body>
</html>