{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="btn btn-dark" href="ABMbandas"> Volver </a>
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
                <th>nombre</th>
                <th>album</th>
                <th>canciones</th>
                <th>año</th>
                <th>Genero</th>
                <th>imagen</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tr>

            <form action="guardar_edicion_banda" method="POST" enctype="multipart/form-data">
                {foreach from=$datos item=dato}
                    <input type="hidden" name="id" value="{$dato->id_band}">
                    <td> <input type="text" name="nombre" value="{$dato->name}"></td>
                    <td><input type="text" name="album" value="{$dato->album}"></td>
                    <td><input type="text" name="cancion" value="{$dato->songs}"></td>
                    <td> <input type="text" name="anio" value="{$dato->year}"></td>
                    <td><select name="genero">
                            {foreach from=$genero item= $generos}
                                <option>{$generos->name_genre}</option>
                            {/foreach}
                        </select></td>
                    <td><input type="file" name="input_name" id="imageToUpload"></td>
                    <td><button type="submit">Editar</button>
            </tr>
        {/foreach}
        </form>

        </tbody>
    </table>
</section>