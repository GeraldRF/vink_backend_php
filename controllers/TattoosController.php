<?php

class TattoosController {

    private $tattoos;

    public function __construct()
    {
        include './bs/TattoosServices.php';
        $this->tattoos = new TattoosServices();
    }

    function getAllTattoos () {
        
        try {

            $response = $this->tattoos->all(); 
            return BaseResponse::success($response);  
 
        } catch(Exception $e){
 
            return BaseResponse::error($e->getMessage());
 
        }
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

    function getCategories () {
        
        try {

           $response = $this->tattoos->categories(); 
           return BaseResponse::success($response);  

        } catch(Exception $e){

            return BaseResponse::error($e->getMessage());

        }

    }

}