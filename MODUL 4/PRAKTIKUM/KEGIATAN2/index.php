<?php

include "Class/childHero.php";

use Class\MageHero;



$requestUri = $_SERVER['REQUEST_URI'];

// Define routes
$routes = [
    '/mage' => 'MageHero'
];


if (array_key_exists($requestUri, $routes)) {
    $MageHero = $routes[$requestUri];
    $hero = new MageHero("Rafli", "Male");

    
    echo $hero->AllData();
} else {
 
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}




?>