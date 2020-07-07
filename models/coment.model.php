<?php
require_once 'models/conection.model.php';

class ComentsModel{
    private $conection;

    public function __construct()
    {
        $this->conection = new ConectionModel;
    }

    public function getAll(){
       $db = $this->conection->createConection();
       $sentencia = $db->prepare('SELECT * FROM coments');
       $sentencia->execute();
       return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function get ($id){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT coments.id_coments, coments.coments, coments.puntage, band.id_band, user.username FROM coments JOIN band JOIN user ON coments.id_user_fk = user.id_user AND coments.id_band_fk = band.id_band WHERE band.id_band = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete ($id){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('DELETE FROM coments WHERE id_coments = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function a_comentary($id){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM coments WHERE id_coments = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function insert($comentario, $valor, $IdUser, $idBand){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('INSERT INTO coments (coments, puntage, id_user_fk, id_band_fk) VALUES (?,?,?,?)');
        $sentencia->execute([$comentario, $valor, $IdUser, $idBand]);

        return $this->conection->createConection()->lastInsertId();
    }
}