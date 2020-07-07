'use strict';
//alert ("holaaaa");

let p = document.getElementById("priority").value;


//instalo Vue
let app = new Vue({
    el: "#app-comments",
    data: {
        promedio: 0,
        priority: p,
        loading: true,
        comentarios: []
    },
    /* methods: {
         borrar: function (id) {
             deleteComment(id);
         }
 
     }*/
});

loadComments(); //al cargar la pagina se muestran todos los comentarios
setInterval(loadComments, 5000); //se recargan los comentarios cada 5 segundos

function loadComments() {
    let id = document.querySelector("#id_band").value; //traigo el id de la banda del tpl detail (linea 31)

    fetch('api/comentarios/' + id)
        .then(response => response.json())
        .then(a => {
            app.loading = false

            if (a != "no existe la tarea") {


                app.comentarios = a; //guardo en la variable los datos que retorna el modelo 
                let suma = 0;
                let contador = 0;

                for (let comment of a) {
                    suma = suma + parseInt(comment.puntage);
                    contador++;
                }
                let promedio = (suma / contador).toFixed(2);
                app.promedio = promedio;

                if (contador == 0) {
                    app.promedio = 0;
                }



            }



        })
        .catch(error => console.log(error));
}

function deleteComment(id) {
    fetch('api/borrarComentario/' + id, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' }
    })
        .then(response => {
            console.log(response);
        })
        .then(function () {
            loadComments();
        })
        .catch(error => console.log(error));
}
