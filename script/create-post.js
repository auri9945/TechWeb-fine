// creazione post
$(document).ready(function(){

    // SCRIPT POP UP CREATE POST
    $("#myBtnPost").click(function() {
        // Prendi il popup del login tramite ID - JQuery
        $("#myModalPost").show();
        // disattivo scrolling sul body
        document.body.style.overflow = 'hidden';
    });

    $("#popupClsPost").click(function() {
        // prendi il popup del POST tramite ID - JQuery
        $("#myModalPost").hide();
        // attivo scrolling sul body
        document.body.style.overflow = '';
        resetPopUpFields("createPostTitle", "createPostSubject", "createPostContent");
    });

    $(document).on('submit', '#createForm', function(e) {
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
                resetPopUpFields("createPostTitle", "createPostSubject", "createPostContent");
                loadPosts();
            }
        });
    });
});