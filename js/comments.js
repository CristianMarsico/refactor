'use strict';
//alert ("holaaaa");

let p = document.getElementById("priority").value;


//instalo Vue
let app = new Vue({
    el: "#app-comments",
    data: {
        error : false,
        promedio: 0,
        priority: p,
        loading : true,
        comentarios: []
    },
    methods: {
        borrar: function (id) {
            deleteComment(id);
        }

    }
});

loadComments(); //al cargar la pagina se muestran todos los comentarios
setInterval(loadComments, 1000); //se recargan los comentarios cada 5 segundos

function loadComments() {
    //app.loading = true;
    let id = document.querySelector("#id_band").value; //traigo el id de la banda del tpl detail (linea 31)

    console.log(id);
    fetch('api/comentarios/' + id)
        .then(response => response.json())
        .then(a => {
           // console.log(a);
           //app.loading = false;
           if (a == "no hay comentarios"){
               app.error = true;
           }else{
               app.error = false;
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
            app.comentarios = [];
            app.promedio = 0;
            loadComments();
        })
     //   .then(function () {
      //  })
        .catch(error => console.log(error));
}
document.querySelector("#form-comentario").addEventListener('submit', addComment);

function addComment() {
    event.preventDefault();

    let banda = document.querySelector("#id_band").value;

    //recuperamos los valores del formulario
    let comentario = document.getElementById("comentario").value;
    let puntaje = document.getElementById("puntuacion").value;
    let usuario = document.getElementById("id_user").value;

    //creamos el objeto
    let info = {
        "coments": comentario,
        "puntage": puntaje,
        "id_user_fk": usuario,
        "id_band_fk": banda
    }
    console.log(comentario);
    if (comentario == " " || puntaje == " ") {
        alert("Hay campos vacios");
        return false;
    }
    else {
        fetch('api/comentario', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(info)
        })
            .then(response => {
                console.log(response);
            })
            .then(function () {
                document.getElementById("comentario").value = " ";
                loadComments();
            })
            .catch(error => console.log(error));
    }
}