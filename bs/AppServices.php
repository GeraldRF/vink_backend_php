<?php

class AppServices {

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

    function settings(){
        $sql = $this->dbConn->prepare("SELECT * FROM settings");

        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        return $sql->fetchAll();
    }

}


?>