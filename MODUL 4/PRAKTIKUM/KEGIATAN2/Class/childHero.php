<?php

namespace Class;

include "Class/parentHero.php";
include "Traits/trait.php";
include "Controller/JsonFormatter.php";


use Controller\JsonFormatter;
use Traits\TraitHero;

class MageHero extends Hero {

    use TraitHero;
    use JsonFormatter;

    private $element = "";
    

    public function intro() : string {
        return "I am $this->name, Hahahahaa I'll kill you";
    }

    public function GetElement() : string {
        return $this->fireElement();
    }

    public function allData(){

        $data = [
            "Name" => $this->name,
            "Gender" => $this->gender,
            "Element" => $this->GetElement(),
            "Intro" => $this->intro()
        ];

        $type = [
            "Hero Type" => "Mage",
            "Data" => $data
        ];

        return $this->JsonFormatter(200, "Success", $type);

    }
}

class FighterHero extends Hero {

    use TraitHero;
    use JsonFormatter;

    private $element = "";
    

    public function intro() : string {
        return "I am $this->name, Brush Brush Brush";
    }

    public function GetElement() : string {
        return $this->waterElement();
    }

    public function allData(){
        $data = [
            "Name" => $this->name,
            "Gender" => $this->gender,
            "Element" => $this->GetElement(),
            "Intro" => $this->intro()
        ];

        $type = [
            "Hero Type" => "Fighter",
            "Data" => $data
        ];

        return $this->JsonFormatter(200, "Success", $type);

    }

    
    
}

