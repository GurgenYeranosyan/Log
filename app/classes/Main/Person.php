<?php

namespace App\Main;

use App\Core\Log;

class Person{

    private $name;

    public function setName($value){

        $array = ["Gugo","Mirvel"];
        $log = Log::setPathByClassName(__CLASS__);
        $log->log("Log Class " . $value . " " . json_encode($array));
        $this->name = $value;
    }

    public function getNmae(){

        $log = Log::setPathByMethodName(__METHOD__);
        $log->log("Log Method 1");
        return $this->name;
    }

}