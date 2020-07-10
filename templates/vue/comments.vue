{literal}
<section id="app-comments">


  <div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Comentarios</h4>
        <span>
          Puntuacion promedio: {{promedio}}
        </span>
    </div>
    
    <div class="card" class="col-md-12">
      <ul id= "list-comments"class="list-group list-group-flush">
        <li v-for= "coments in comentarios" class="list-group-item">
       <span class="badge badge-dark">Usuario {{coments.username}}</span> - "{{coments.coments}}" - Puntaje: {{coments.puntage}}
        <button class="btn btn-link" v-if="priority == 1" v-on:click="borrar(coments.id_coments)">Borrar</button>
        </li>
        </ul>
    </div>

  </div> 
</section>
{/literal}
