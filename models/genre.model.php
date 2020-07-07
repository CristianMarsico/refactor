<?php
require_once 'models/conection.model.php';
class GenreModel{
    private $conection;

    public function __construct()
    {
        $this->conection = new ConectionModel;
    }

    public function getAll(){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM genre');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}