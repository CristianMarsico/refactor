<?php
require_once 'models/conection.model.php';
class GenreModel
{
    private $conection;

    public function __construct()
    {
        $this->conection = new ConectionModel;
    }

    public function getAll()
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM genre');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($genero)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare("INSERT INTO genre (name_genre) VALUES (?)");
        return $sentencia->execute([$genero]);
    }
    public function get($nombre)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM genre WHERE name_genre = ?');
        $sentencia->execute([$nombre]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('DELETE FROM genre WHERE id_genres = ?');
        $sentencia->execute([$id]);
    }

    public function getId($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM genre WHERE id_genres = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGenre($nombre)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT* FROM genre WHERE name_genre = ?');
        $sentencia->execute([$nombre]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function editGenre($id, $nombre)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare("UPDATE  `genre` SET `name_genre` = ? WHERE `id_genres` = ?");
        return $sentencia->execute([$nombre, $id]);
    }

    public function getCdsByGenres($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT band.name, band.songs, band.id_band,band.album, band.image FROM genre JOIN band ON band.id_genres_fk = genre.id_genres WHERE genre.id_genres = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
