// creazione post
$(document).ready(function(){

    // SCRIPT POP UP CREATE POST
    $("#create_post_btn").click(function() {
        // Prendi il popup del login tramite ID - JQuery
        $("#modal_post").show();
        // disattivo scrolling sul body
        document.body.style.overflow = 'hidden';
    });

    $("#popupClsPost").click(function() {
        // prendi il popup del POST tramite ID - JQuery
        $("#modal_post").hide();
        // attivo scrolling sul body
        document.body.style.overflow = '';
        resetPostPopUpFields("createPostTitle", "createPostSubject", "createPostContent");
    });

    $(document).on('submit', '#create_post_form', function(e) {
        // evito che il submit ricarichi la pagina
        e.preventDefault();

        // richiamo funzione per controllare i campi del popup
        var fieldsAreValid = popUpFieldsAreValid("createPostTitle", "createPostSubject", "createPostContent");
        
        // controllo il valore ritornato dalla funzione
        if(!fieldsAreValid) {
            return false;
        }

        // costruisco un oggetto con i campi del popup
        var newPostObj = {};
        newPostObj.titolo = $("#createPostTitle").val().trim();
        newPostObj.materia = $("#createPostSubject").val();
        newPostObj.contenuto = $("#createPostContent").val().trim();

        // chiamata per l'inserimento a DB
        $.ajax({
            url: 'api_server/createNewPost.php',
            dataType: "json",
            type: 'POST',
            data: {newPost: newPostObj},
            success: function(data) {
                console.log(data.message);
                $("#popupClsPost").click();
                resetPostPopUpFields("createPostTitle", "createPostSubject", "createPostContent");
                loadPosts();
            }
        });
    });
});