<?php

class connexion
{
    private $dsn = "mysql:host=localhost;dbname=furniture_project;charset=utf8;port=3306";
    private $dbuser = "root";
    private $dbpass = "";
    public $conn;

    public function CNXbase()
    {
        try{
            $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
        }catch(PDOException $e){
            echo 'Error : ' .$e->getMessage();
        }
        return $this->conn;
    }
}

?>

