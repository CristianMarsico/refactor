{include 'templates/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="tareas">Volver</a>
                <h4>A/B/M DE BANDAS</h4>
                <a class="btn btn-dark" name="agregar_banda" href="agregar_banda">Dar de alta</a>
            </nav>
        </div>
    </div>
</div>
<div>
    <b class="navbar-brand">Seleccione una OPCIÓN (En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Usuarios)</b>
</div>
<section class="container">
    <table class="table">
        <caption>LISTA DE PRODUCTOS</caption>
        <thead>
            <tr>
                <th>nombre</th>
                <th>album</th>
                <th>canciones</th>
                <th>año</th>
                <th>Imagen</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tr>
            {foreach from=$bands item=datos}
                <td>{$datos->name}</td>
                <td>{$datos->album}</td>
                <td>{$datos->songs}</td>
                <td>{$datos->year}</td>
                <td>{$datos->image}</td>
                <td><a href="eliminar_banda/{$datos->id_band}">eliminar<a> | <a href=" editar_banda/{$datos->id_band}">editar<a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</section>