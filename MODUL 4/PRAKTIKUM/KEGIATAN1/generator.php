<?php

function generator($n){
    $array = array();

    for ($i=0; $i <= $n; $i++) { 
        array_push($array, $i);
    }

    echo "Nilai yang diuji: ";
    foreach($array as $value){
        echo  $value . ", ";
    }
    

    for ($i=0; $i <= $n; $i++) { 
        
        if ($i % 3 == 0){
            echo "Hello\n";
        }
        elseif ($i % 5 == 0){
            echo "World\n";
        }
        else{
            echo "$i\n";
        }
    }
}

generator(15);