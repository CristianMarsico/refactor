<?php
require_once 'models/conection.model.php';

class UserModel
{
    private $conection;

    public function __construct()
    {
        $this->conection = new ConectionModel();
    }

    public function getAll()
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare("SELECT * FROM user ORDER BY priority ASC");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    public function insert($nombre, $priority, $clave)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('INSERT INTO user (username, priority, password) VALUES (?,?,?)');
        return $sentencia->execute([$nombre, $priority, $clave]);
    }

    public function delete($id){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('DELETE FROM user WHERE id_user = ?');
        $sentencia->execute([$id]);
    }

    public function get($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM user WHERE id_user = ?');
        $sentencia->execute([$id]);
        $obtenerId = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $obtenerId;
    }

    public function update($id, $nombre, $username, $pass)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare("UPDATE `user` SET `username` = ?, `priority` = ?, `password` = ? WHERE `id_user` = ?");
        $sentencia->execute([$nombre, $username, $pass, $id]);
    }

    public function users($user)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM user WHERE username = ?');
        $sentencia->execute([$user]);
        $users = $sentencia->fetch(PDO::FETCH_OBJ);

        return $users;
    }

    public function new($usuario, $contraseña, $priority){
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('INSERT INTO user(username, password, priority) VALUES (?, ?, ?)');
        return $sentencia->execute([$usuario, $contraseña, $priority]);       
    } 

}