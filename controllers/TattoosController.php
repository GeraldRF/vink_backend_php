<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With, X-Custom-Header, Authorization");

//Revisar autheticacion
$headers = getallheaders();
if(isset($headers["Authorization"])){
$token = $headers["Authorization"];
// if(explode(" ", $token)[1] != "$2y$10\$GwGaUqJK3uPib0iaxS6B9u2uLXh6z4Fok3hGec1/wwfAmFNazXB7.")
// {
//     header("HTTP/1.1 401 Unauthorized");
//     echo "<h1 style=\"width:95%; text-align:center; color:red; padding:40px; background-color:#ff03033b;\">Acceso no autorizado</h1>";
//     exit();
// }
// }else{
//     header("HTTP/1.1 401 Unauthorized");
//     echo "<h1 style=\"width:95%; text-align:center; color:red; padding:40px; background-color:#ff03033b;\">Acceso no autorizado</h1>";
//     exit();
}

class TattoosController {

    function getAllTattoos () {
        echo('getting all tattos');  
    }

    function findTattoo () {
        echo('find tatto');  
    }

    function createTattoo () {
        $_POST['tattoId'];
        echo('create tatto');  
    }

    function getPromotions () {
        echo('get prmotions');  
    }

    function getCalatogue () {
        echo('get catalogue');  
    }

    function getWorks () {
        echo('get works');  
    }

}

