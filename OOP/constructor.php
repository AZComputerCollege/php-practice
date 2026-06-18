<h1>Constructor</h1>
<?php
     class BankAccount
     {
        public $balance=0;
        public function __construct(float $initialAmount)
        {
            echo "Calling constructor <br><br>";
           $this->balance = $initialAmount;
        }

        public function getBalance(){
            return $this->balance;
        }

        public function __destruct()
        {
            unset($this->balance);
            echo "<br><br> Calling destructor <br><br>";
        }
     }

     class Jazzcash extends BankAccount
     {
        public function __construct(float $newInitialAmount)
        {
            echo "Calling Child constructor <br><br>";
           $this->balance = $newInitialAmount-50;
        }

        
        public function getBalance(){
            echo " <br><br> Calling Child getbalance <br><br>";
            return $this->balance - 100;
        }

        public function deposit(float $amount){
            $this->balance += $amount;
        }

        public function __destruct()
        {
            unset($this->balance);
            echo "<br><br> Calling child destructor <br><br>";
        }
     }


    //  $user = new BankAccount(200.5);
    //  $user->deposit(300);
    //  $balance = $user->getBalance();
    //  echo $balance;

    $user2 = new Jazzcash(200);
    $user2->deposit(300);
    $balance = $user2->getBalance();
    echo $balance;
?>

