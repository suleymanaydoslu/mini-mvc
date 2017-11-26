<?php

class Test{

    private $name;
    private $age;
    
    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($property){
        if(property_exists($this, $property)){
            return $this->$property;
        }else{
            throw Exception("no method");
        }
    }

    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
}

$test = new Test('Süleyman',25);
$test->__set("age",89);
echo $test->__get('age');