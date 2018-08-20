<?php
namespace App\Main;

class Worker extends Person{

    private $age;

    public function setAge($value){

        $this->age = $value;
    }

    public function getAge(){

        return $this->age;
    }
}