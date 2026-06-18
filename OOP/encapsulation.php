<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Encapsulation</h1>

    <h1>
    <?php
         class BankAccount
         {
            // Access Modifiers
            protected $balance=0;

            public function __construct($amount)
            {
               $this->balance = $amount;
            }

            public function getBalance(){
                return $this->validateBalance();
            }

            private function validateBalance(){
                if($this->balance<100){
                    return "Balance is insufficient";
                }else{
                    return $this->balance;
                }
            }

         }

         class EasyPaisaAccount extends BankAccount
         {
            public function getEasyPaisaAccount(){
                return $this->balance;
            }
         }

         class ChildEasyPaisa extends EasyPaisaAccount
         {
              public function getChildEasyPaisa(){
                return $this->balance;
            }
         }


        //  $hbl = new BankAccount(5000);
        //  echo $hbl->getBalance();

        // $epaisa = new EasyPaisaAccount(3000);
        // echo $epaisa->getEasyPaisaAccount();
        $epaisa = new ChildEasyPaisa(3000);
        echo $epaisa->getChildEasyPaisa();

        // echo $epaisa->balance;
    ?>

    </h1>
</body>
</html>