{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="ABMuser">Volver</a>
                <h4><b>Agregar</b></h4>
            </nav>
        </div>
    </div>
</div>

<section class="container">
    <table class="table">
        <caption>Agregar Adminstrador</caption>
        <thead>
            <tr>
                <th>Apellido/nombre</th>
                <th>Prioridad</th>
                <th>Contraseña</th>
                <th>Botón</th>
            </tr>
        </thead>

        <form action="agregar_usuario" method="POST">
            <tbody id="lista">
                <tr>
                    <td> <input type="text" name="nombre"></td>
                    <td> <input type="text" name="prioridad"></td>
                    <td> <input type="text" name="pass"></td>
                    <td><button type="submit">Agregar datos</button></td>
                </tr>
            </tbody>
        </form>     
    </table>
    {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
    {/if}
</section>