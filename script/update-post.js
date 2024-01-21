// update post
$(document).ready(function(){

    // SCRIPT POP UP UPDATE POST
    $("#popupClsUpdate").click(function() {
        // prendi il popup del UPDATE tramite ID - JQuery
        $("#myModalUpdate").hide();
        // attivo scrolling sul body
        document.body.style.overflow = '';
        resetPostPopUpFields("modificaPostTitle", "modificaPostSubject", "modificaPostContent");
        $("#modificaPostSubmit").attr("data-post-id", "");
    });

    $(document).on('click', '.cardModificaPost', function(e) {
      // RECUPERO L'ID DEL POST TRAMITE L'ATTRIBUTO DELL'ELEMENTO
        var postId = $(this).attr("data-post-id");
        var idMateria = document.getElementById("cardMateria"+postId).getAttribute("data-materia-id");
        // prendi il popup del UPDATE tramite ID - JQuery
        $("#modificaPostTitle").val($("#cardTitle"+postId).text().trim());
        $("#modificaPostContent").val($("#cardContent"+postId).text().trim());
        $("#modificaPostSubject").val(idMateria);
        $("#modificaPostSubmit").attr("data-post-id", postId);

        $("#myModalUpdate").show();

        // disattivo scrolling sul body
        document.body.style.overflow = 'hidden';
    });

    // funzione evento submit su elemento specifico
    $(document).on('submit', '#updateForm', function(e) {
        // evito che il submit ricarichi la pagina
        e.preventDefault();

        var fieldsAreValid = popUpFieldsAreValid("modificaPostTitle", "modificaPostSubject", "modificaPostContent");
        
        if(!fieldsAreValid) {
            return false;
        }

        // recupero i valori degli elementi e escludo gli spazi in eccesso
        var titoloNuovoPost = $("#modificaPostTitle").val().trim();
        var idMateriaNuovoPost = $("#modificaPostSubject").val();
        var contenutoNuovoPost = $("#modificaPostContent").val().trim();
        // recupero il valore dell'attributo salvato sul bottone del form
        var idPost = $(this).find("button[id='modificaPostSubmit']").attr("data-post-id");
        
        // richiamo l'API per l'aggiornamento del post 
        $.ajax({
            url: 'api_server/updatePost.php',
            dataType: "json",
            type: 'POST',
            data: {
                titolo : titoloNuovoPost,
                idMateria : idMateriaNuovoPost, 
                contenuto : contenutoNuovoPost,
                id : idPost
            },
            success: function(data) {
                console.log(data.message);
                loadPosts();
                $("#myModalUpdate").hide();
                resetPostPopUpFields("modificaPostTitle", "modificaPostSubject", "modificaPostContent");
                $("#modificaPostSubmit").attr("data-post-id", "");
            },
            error: function(data) {
                console.log(data.message);
            }
        });
    });
});