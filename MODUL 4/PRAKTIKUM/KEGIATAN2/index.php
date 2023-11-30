<?php

include "Class/childHero.php";

use Class\MageHero;
use Class\FighterHero;

$requestUri = $_SERVER['REQUEST_URI'];

// Define routes
$routes = [
    '/mage' => 'MageHero',+

    +
    '/fighter' => 'FighterHero'
];

if (array_key_exists($requestUri, $routes)) {
    $heroClass = $routes[$requestUri];
    
    if ($heroClass === 'MageHero') {
        $hero = new MageHero("Cyclops", "Male");
    } elseif ($heroClass === 'FighterHero') {
        $hero = new FighterHero("Ruby", "Female");
    }
    echo $hero->allData();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
?>
