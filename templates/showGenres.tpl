{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="tareas">Volver</a>
                <h4>A/B/M DE LOS GENEROS</h4>
                <a class="btn btn-dark" name="agregar_genero" href="agregar_genero">Dar de alta</a>
            </nav>
        </div>
    </div>
</div>
<div>
<b class="navbar-brand">Seleccione una OPCIÓN (En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Usuarios)</b>
</div>
<section class="container">
    <table class="table">
        <caption>LISTA ADMINISTRADORES</caption>
        <thead>
            <tr>
                <th>Genero Musical</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tbody id="lista">
            <tr>

                {foreach from=$generos item=$datos}
                    <td>{$datos->name_genre}</td>
                    <td><a href="eliminar_genero/{$datos->id_genres}">eliminar<a> | <a href="editar_genero/{$datos->id_genres}">editar<a></td>
                </tr>
            {/foreach}


        </tbody>
    </table>
</section>