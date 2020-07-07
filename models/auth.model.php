<?php
require_once ('models/conection.model.php');
class AuthModel{
    private $conection;
   
    public function __construct() {
        $this->conection = new ConectionModel();
    }

    public function getUser($username){
        $db= $this->conection->createConection();
        $sentencia = $db->prepare("SELECT * FROM user WHERE username = ?");
        $sentencia->execute([$username]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}