<?php
require_once 'libs/router/Router.php';
require_once 'api/comments-api.controller.php';
//var_dump($_REQUEST['resource']);

//creo el ruteador
$router= new Router();

//1 entrada en url, 2 verbo, 3 nombre de la clase, 4 como llamo a la funcion
$router->addRoute('comentario/:ID', 'GET', 'CommentsApiController', 'comment');
$router->addRoute('comentarios', 'GET', 'CommentsApiController', 'getComments'); //trae todos los comentarios
$router->addRoute('comentarios/:ID', 'GET', 'CommentsApiController', 'getComment');
$router->addRoute('borrarComentario/:ID', 'DELETE', 'CommentsApiController', 'delete'); //borra un comentario
$router->addRoute('comentario', 'POST', 'CommentsApiController', 'add'); //agrega un comentario

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
