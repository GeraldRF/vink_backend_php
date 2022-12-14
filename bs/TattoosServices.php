<?php

class TattoosServices {

    public $dbConn;

    function __construct()
    {
        include './da/DBConfig.php';
        include "./da/QueryUtils.php";

        $this->dbConn =  connect(
            array(
                'host' => HOST,
                'username' => USERNAME,
                'password' => PASSWORD,
                'db' => DB
            )
        );
    } 

    function all(){
        $sql = $this->dbConn->prepare("SELECT * FROM tattoos");

        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        return $sql->fetchAll();
    }

    function categories () {

        $sql = $this->dbConn->prepare("SELECT * FROM categories");

        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        return $sql->fetchAll();
    }

}


?>