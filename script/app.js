// FUNZIONI JS CONDIVISE

// funzione usata per generare l'html con i dati dei post
function showPosts(postList) {
    var htmlPostElements = "";
    // eseguo un ciclo foreach di JQuery per generare il codice HTML per ogni POST
    $.each(postList, function (key, post) {
        htmlPostElements+=`<div class="col-4 d-flex justify-content-center align-content-center">
        <div class="card">
        <div class="row">
            <div class="col-7">
            <h3 class="card__materia" id="cardMateria` + post.id + `" data-materia-id="` + post.id_materia + `"> 
                ` + post.materia + `
            </h3>
            </div>
        <div class="col-2 card_modifica"> 
            <svg id="cardModifica` + post.id + `" data-post-id="` + post.id + `" class="cardModificaPost" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                <title>Modifica</title>
            </svg>
        </div>
        <div class="col-3 card_elimina">
            <svg id="cardElimina` + post.id + `" data-post-id="` + post.id + `" class="cardEliminaPost" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                <title>Elimina</title> 
            </svg>
        </div>
        </div>
        <p class="card__title" id="cardTitle` + post.id + `"> ` + post.title + ` </p>
        <p class="card__content" id="cardContent` + post.id + `"> ` + post.content + ` </p>
        <div class="card__user"> ` + post.user + `</div>
        <div class="card__arrow">
            <svg id="cardDettaglio` + post.id + `" data-post-id="` + post.id + `" class="cardDettaglioPost" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15" >
            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
            </svg>
        </div>
        </div>
    </div>`
    });
    // carico l'html generato nel div specifico
    $("#postContainer").html(htmlPostElements);
}

// funzione usata per controllare i campi dei popup
function popUpFieldsAreValid(idCampoTitolo, idCampoMateria, idCampoContenuto) {
    // recupero i valori dei campo in modo dinamico tramite parametri
    var titoloPost = $('#'+idCampoTitolo).val();
    var materiaPost = $('#'+idCampoMateria).val();
    var contenutoPost = $('#'+idCampoContenuto).val();

    // controlli campi popup non compilati
    // creo una variabile per capire se ci sono stati errori
    var err = false;

    if(titoloPost===''){
        document.getElementById(idCampoTitolo).style.borderColor = "red";
        err = true;
    } else {
        document.getElementById(idCampoTitolo).style.removeProperty("border-color");
    }
    if(materiaPost == null){
        document.getElementById(idCampoMateria).style.borderColor = "red";
        err = true;
    } else {
        document.getElementById(idCampoMateria).style.removeProperty("border-color");
    }
    if(contenutoPost==='') {
        document.getElementById(idCampoContenuto).style.borderColor = "red";
        err = true;
    } else {
        document.getElementById(idCampoContenuto).style.removeProperty("border-color");
    }

    // se non ci sono errori, ritornerò true, altrimenti false
    return !err;
}

// svuoto i campi dei pop up, recuperati tramite parametri
function resetPopUpFields(idCampoTitolo, idCampoMateria, idCampoContenuto) {
    $('#'+idCampoTitolo).val('');
    document.getElementById(idCampoTitolo).style.removeProperty("border-color");
    
    $('#'+idCampoMateria).val('');
    document.getElementById(idCampoMateria).style.removeProperty("border-color");
    
    $('#'+idCampoContenuto).val('');
    document.getElementById(idCampoContenuto).style.removeProperty("border-color");
}
