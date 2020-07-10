{include 'templates/header.tpl'}
<div class="card" style="width: 30rem;">
    {foreach from=$valor item= detalles}
    
    
        {if !empty($detalles->image)}
            <img src="{$detalles->image}" class="card-img-top" alt="...">
        {else}
            <img src="images/cds/error.jpg" class="card-img-top" alt="...">
        {/if}
    
        <div class="card-body">
            <h3 class="card-title">{$detalles->name}</h3>
            <h5 class="card-title">Album: {$detalles->album}</h5>
            <h5 class="card-text">Año: {$detalles->year}</h5>
        </div>
        <ol class="list-group list-group-flush">
            {foreach from=$temas item= tema}
                <li class="list-group-item">{$tema}</li>
            {/foreach}
        </ol>
    
    {/foreach}

    <!--PARTE DE VUE-->
    <div style="width: 30rem;">
        {include 'vue/comments.vue'}
    </div>

    <form method="POST" id="form-comentario">
        <input id="id_band" type="hidden" value={$detalles->id_band}>
        <input id="id_user" type="hidden" value={$id}>
        <input id="priority" type="hidden" value={$priority}>

        {if $admin}
            <span class="badge badge-dark">{$admin}</span> <input id="comentario" type="text" size="30" maxlength="30" placeholder="Deje su comentario">
            <label>Puntaje</label>
            <select id="puntuacion">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
    
            <input class="btn btn-link" type="submit" value="Comentar">
    
        {else}
            <p>Para comentar, debe resgistrarse aqui -
                <a name="registro" href="registro">Registrarme</a></p>
        {/if}
    </form>
</div>


<script src="js/comments.js"></script>