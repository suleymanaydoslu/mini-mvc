<?php

class Person{

    protected $name;
    protected $age;
    
    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age; 
    }
}

class Customer extends Person{

    private $balance;

    public function __construct($name,$age,$balance){
        parent::__construct($name, $age);
        $this->balance = $balance;
    }

    public function pay($amount){

        return $this->name. ' pays : $'. $amount;
    }

    public function getBalance(){

        return $this->balance;
    }

    public function setBalance($b){
        $this->balance = $b;
    }
}

$customer = new Customer("Süleyman",78,789);
echo $customer->pay(89);
//$customer->setBalance(789);
echo "<br>";
echo $customer->getBalance();


// eğerki üçüncü bir propert set etmezsen bir üstteki classın constructı direk çalışıyor.
// ama üçüncü bir property set etmek isterse construct methodda parent::construct ile diğerlerinide çağırmak şart.