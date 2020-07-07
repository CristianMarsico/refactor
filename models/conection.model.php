<?php

class ConectionModel
{

    public function createConection()
    {

        //$db = new PDO ('mysql:host=localhost;'.'dbname=db_music;charset=utf8', 'root', '');
        //                                    'db_music' nombre que le doy a la carpeta raiz de MySQL
        $host = 'localhost';
        $userName = "root";
        $password = '';
        $dataBase = 'db_musica';
        try {
            $db = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $userName, $password);
        } catch (Exception  $e) {
            var_dump($e);
        }
        return $db;
    }
}
