<?php

namespace Class;

abstract class Hero {

    public $name;
    public $gender;

    public function __construct($name, $gender){
        $this->name = $name;
        $this->gender = $gender;
        
    }

    abstract public function intro() : string;
    
}