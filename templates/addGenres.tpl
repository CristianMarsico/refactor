{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="ABMgeneros">Volver</a>
                <h4><b>Agregar</b></h4>
            </nav>
        </div>
    </div>
</div>
<section class="container">
    <table class="table">
        <caption>Agregar Banda</caption>
        <thead>
            <tr>
                <th>Tipo de Genero</th>
                <th>Botón</th>
            </tr>


        </thead>
        <form action="guardar_genero" method="POST">
            <tbody id="lista">
                <tr>
                    <td> <input type="text" name="nombre_genero"></td>
                    <td><button type="submit">Agregar datos</button></td>
                </tr>
            </tbody>
            {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}
        </form>
    </table>
</section>