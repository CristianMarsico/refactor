{include 'templates/header.tpl'}
<div class="container">
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-dark" href="ABMgeneros"> Volver </a>
            <a class="navbar-brand">Editar</a>
        </nav>
    </div>
</div>
</div>
<section class="container">
    <table class="table">
        <caption>LISTA DE PRODUCTOS</caption>
        <thead>
            <tr>
                <th>Tipo de Genero</th>
                <th>Botón</th>
            </tr>
        </thead>
        <form action="guardar_edicion_genero" method="POST">
            {foreach from=$id item= datos}
                <input type="hidden" name="id_genero" value="{$datos->id_genres}">
                <td> <input type="text" name="nombre_generos" value="{$datos->name_genre}"></td>
                <td><button type="submit">Modificar datos</button></td>
                </tr>
                {if $error}
                    <div class="alert alert-danger">
                        {$error}
                    </div>
                {/if}
            {/foreach}
        </form>

        </tbody>
    </table>
</section>