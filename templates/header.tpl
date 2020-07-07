<!DOCTYPE html>
<html lang="en">

    <head>
        <base href={$baseURL}>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- development version, includes helpful console warnings -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <link rel="stylesheet" href="css/stylos.css">
        <title>Trabajo practico especial</title>
    </head>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand"> <b>Mi musica de compu</b> </a>
                        <a class="btn btn-dark" name="home" href="home"> Home </a>
                        <a class="btn btn-dark" name="generos" href="generos"> Generos </a>
                        <a class="btn btn-dark" name="bandas" href="bandas">Lista Completa</a>
                        {if $session}
                            {if $priority == 1}
                                <a class="btn btn-dark" name="tareas" href="tareas">Tareas</a>
                            {/if}
                            <a class="btn btn-dark" name="logout" href="logout">cerrar sesion</a>
                            <a class="btn btn-dark" name="" href="">{$admin}</a>
                        {else}
                            <a class="btn btn-dark" name="registro" href="registro">Registrarme</a>
                            <a class="btn btn-dark" name="admin" href="showForm">Iniciar Sesion</a>
                        {/if}
                    </nav>
                </div>
            </div>
        </div>