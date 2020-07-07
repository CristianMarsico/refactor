"use strict";
let btn_borrar = document.getElementsByName("delete");
console.log("a ver si adna");
 for(let i = 0; i< btn_borrar.lenght; i++)
{
    btn_borrar[i].addEventListener('click', e => {
        console.log(e.target);
        // deleteComments(e)

    });

}