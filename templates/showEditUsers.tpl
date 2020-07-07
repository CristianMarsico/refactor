{include 'templates/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="ABMuser"> Volver </a>
                <a class="navbar-brand">Editar</a>
            </nav>
        </div>
    </div>
</div>
<section class="container">
    <table class="table">
        <caption>Editar Usuarios</caption>
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Prioridad</th>
                <th>Contraseña</th>
                <th>Botón</th>
            </tr>
        </thead>
        <form action="editar_usuario" method="POST">
            {foreach from=$id item=$datos}
                <input type="hidden" name="id_user" value="{$datos->id_user}">
                <td> <input type="text" name="nombre" value="{$datos->username}"></td>
                <td> <input type="text" name="prioridad" value="{$datos->priority}"></td>
                <td> <input type="text" name="pass" value="{$datos->password}"></td>
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