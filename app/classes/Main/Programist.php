<?php
namespace App\Main;

class Programist extends Worker{

    private $skill;

    public function setSkill($value){

        $this->skill = $value;
    }

    public function getSkill(){

        return $this->skill;
    }
}