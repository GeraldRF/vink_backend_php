<?php

class AppController {

    private $app;

    public function __construct()
    {
        include './bs/AppServices.php';
        $this->app = new AppServices();
    }

    function getAllSettings () {
        
        try {

            $response = $this->app->settings(); 

            return BaseResponse::success($response);  
 
        } catch(Exception $e){
 
            return BaseResponse::error($e->getMessage());
 
        }

    }

    function findSettings () {
        echo('find tatto');  
    }

    function updateSetting () {

    }
    

}