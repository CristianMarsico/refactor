<?php
require_once 'models/conection.model.php';

class BandModel
{
    private $conection;

    public function __construct()
    {
        $this->conection = new ConectionModel();
    }

    public function getAll()
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM band');
        $sentencia->execute();
        $bands = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $bands;
    }

    public function get($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM band WHERE id_band = ?');
        $sentencia->execute([$id]);
        $bands = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $bands;
    }

    public function insert($nombre, $album, $canciones, $año, $generos, $imagen = null)
    {
        $pathImg = null;

        if ($imagen) {
            $pathImg = $this->uploadImage($imagen);
        }
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('INSERT INTO band (name, album, songs, year, id_genres_fk, image) VALUES (?,?,?,?,?, ?)');
        return $sentencia->execute([$nombre, $album, $canciones, $año, $generos, $pathImg]);
        //  $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    private function uploadImage($imagen)
    {
        $target = 'upload/tasks/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target); //paso imagen y digo donde iria
        return $target;
    }

    public function delete($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('DELETE FROM band WHERE id_band = ?');
        $sentencia->execute([$id]);
    }

    public function dates($nombre, $album)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare('SELECT * FROM band WHERE name = ? AND album = ?');
        $sentencia->execute([$nombre, $album]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function update($nombre, $album, $cancion, $año, $genero, $id, $imagen = null)
    {
        $pathImg = null;

        if ($imagen) {
            $pathImg = $this->uploadImage($imagen);
        }
        $db = $this->conection->createConection();
        $sentencia = $db->prepare("UPDATE  `band` SET  `name` = ?, 
                                 `album` = ?,  `songs` = ?, `year` = ?,`id_genres_fk` = ?, `image` = ? WHERE `id_band` = ?");
        return $sentencia->execute([$nombre, $album, $cancion, $año, $genero, $pathImg, $id]);
    }

    public function bandsByComments($id)
    {
        $db = $this->conection->createConection();
        $sentencia = $db->prepare(' SELECT user.username , coments.id_coments,coments.coments, 
        coments.puntage, coments.id_user_fk, coments.id_band_fk 
        FROM band JOIN user JOIN coments 
        ON coments.id_user_fk = user.id_user AND coments.id_band_fk = band.id_band WHERE band.id_band = ?');
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
