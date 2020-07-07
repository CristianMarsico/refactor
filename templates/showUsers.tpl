{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="tareas">Volver</a>
                <h4>A/B/M DE LOS ADMINISTRADORES</h4>
                <a class="btn btn-dark" name="agregar_usuario" href="agregar_usuario">Dar de alta</a>
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
                <th>Apellido/Nombre</th>
                <th>Prioridad</th>
                <th>Contraseña</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tbody id="lista">
            <tr>
                {foreach from=$users item=$datos}
                    <td>{$datos->username}</td>
                    <td>{$datos->priority}</td>
                    <td>{$datos->password}</td>
                    <td><a href="eliminar_usuario/{$datos->id_user}">eliminar<a> | <a href="editar_usuario/{$datos->id_user}">editar<a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>