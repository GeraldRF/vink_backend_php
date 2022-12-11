<?php

class MailServices
{
    public $dbConn;

    function __construct()
    {
        include "../DA/DBConfig.php";
        include "../DA/QueryUtils.php";


        $this->dbConn =  connect(
            array(
                'host' => HOST,
                'username' => USERNAME,
                'password' => PASSWORD,
                'db' => DB
            )
        );
    } 

    function createMail($input)
    {
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $id_generated = '';
       
        $id_generated = substr(str_shuffle($permitted_chars), 0, 16);

        try {

            if (!empty($_FILES['file']['name'])) {
                $has_file = 1;
            } else {
                $has_file = 0;
            }

            if ($has_file === 1) {
                $file_uploaded = $this->setFile($id_generated);
                if (!$file_uploaded['isUploaded']) {
                    throw new PDOException('Fallo al subir archivo');
                };
            }

            $id = $id_generated . $_FILES['file']['name'];


            return ["isCreated" => true];
        } catch (PDOException $exception) {
            unlink($file_uploaded['ruta']);
            return ["isCreated" => false, "msg" => $exception->getMessage()];
        }
    }

    function getFile($id)
    {
        $sql = $this->dbConn->prepare("SELECT * FROM files WHERE mail_id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    function setFile($mail_id)
    {

        $ruta_upload = '../Uploads/';

        $subir_archivo = $ruta_upload . $mail_id . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $subir_archivo)) {
            return ['isUploaded' => true, 'ruta' => $subir_archivo];
        } else {
            return ['isUploaded' => false];
        }
    }

    function deleteFile($mail_id)
    {
        try {
            $sql = $this->dbConn->prepare("DELETE FROM files WHERE mail_id=:id");
            $sql->bindValue(':id', $mail_id);
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
