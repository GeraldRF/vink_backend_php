<?php 

class BaseResponse {

    private $data;

    public function __contruct(){
        $this->data = [];
    }

    public static function success($data = []){

        header("HTTP/1.1 200 Ok");

        return json_encode($data);
        
    }

    public static function error($data = []){

        header("HTTP/1.1 400 Bad request");

        return json_encode($data);

    }

}

?>