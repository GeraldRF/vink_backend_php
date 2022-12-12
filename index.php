<?php

// $headers = getallheaders();

// if(isset($headers["Authorization"])){
    
//     $token = $headers["Authorization"];

//     if(explode(" ", $token)[1] != "$2y$10\$GwGaUqJK3uPib0iaxS6B9u2uLXh6z4Fok3hGec1/wwfAmFNazXB7.")
//     {
//         header("HTTP/1.1 401 Unauthorized");
//         echo "<h1 style=\"width:95%; text-align:center; color:red; padding:40px; background-color:#ff03033b;\">Acceso no autorizado</h1>";
//         exit();
//     }

// }else{
//     header("HTTP/1.1 401 Unauthorized");
//     echo "<h1 style=\"width:95%; text-align:center; color:red; padding:40px; background-color:#ff03033b;\">Acceso no autorizado</h1>";
//     exit();
// }

include './controllers/TattoosController.php';
include './controllers/FilesController.php';
//include './controllers/LoginController.php';

$rutas = [ 
    '/tattoos' => ['TattoosController', 'getAllTattoos'],
    '/tattoos/get' => ['TattoosController', 'findTattoo'],
    '/tattoos/create' => ['TattoosController', 'createTattoo'],
    '/catalogue' => ['TattoosController', 'getCatalogue'],
    '/promotions' => ['TattoosController', 'getPromotions'],
    '/works' => ['TattoosController', 'getWorks'],

    '/login' => ['LoginController', 'login'],
];

try {

    $url = $_SERVER['REQUEST_URI'];

    if(array_key_exists($url, $rutas)){

        $controllerName = $rutas[$url][0];
        $functionName = $rutas[$url][1];

        $controllerInstance = new $controllerName();

        $controllerInstance->{$functionName}();

    } else {
        
        header("HTTP/1.1 404 Not found");

        echo("Sorry, we couldn't find this URL");

        exit();
    }

} catch(Exception $e){
 
    echo("Server error: ".$e);
    exit();
    
}