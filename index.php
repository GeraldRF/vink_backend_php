<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With, X-Custom-Header, Authorization");

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

include './bs/ResponseServices.php';

include './controllers/TattoosController.php';
include './controllers/FilesController.php';
include './controllers/AppController.php';
//include './controllers/LoginController.php';

$rutas = [ 
    '/tattoos' => ['TattoosController', 'getAllTattoos'],
    '/tattoos/get' => ['TattoosController', 'findTattoo'],
    '/tattoos/create' => ['TattoosController', 'createTattoo'],
    '/catalogue' => ['TattoosController', 'getCatalogue'],
    '/promotions' => ['TattoosController', 'getPromotions'],
    '/works' => ['TattoosController', 'getWorks'],
    '/categories' => ['TattoosController', 'getCategories'],

    '/login' => ['LoginController', 'login'],

    '/settings' => ['AppController', 'getAllSettings'],
];

try {

    $url = $_SERVER['REQUEST_URI'];

    if(array_key_exists($url, $rutas)){

        $controllerName = $rutas[$url][0];
        $functionName = $rutas[$url][1];

        $controllerInstance = new $controllerName();

        echo ( $controllerInstance -> { $functionName }() );

    } else {
        
        header("HTTP/1.1 404 Not found");

        include './http_codes/404.php';

    }

} catch(Exception $e){
 
    header("HTTP/1.1 500 Server error");

    echo("Server error: ".$e);

    
    
}

exit();