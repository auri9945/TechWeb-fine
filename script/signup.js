// registrazione
$(document).ready(function() {
    // SCRIPT POP UP SIGN UP POST
    $("#SignUpBtn").click(function() {
        // prendi il popup del SIGNUP tramite ID - JQuery
        $("#myModal").hide();
        $("#myModal_signUp").show();
    });
    
    $("#popupCls_signUp").click(function() {
        // prendi il popup del SIGNUP tramite ID - JQuery
        $("#myModal_signUp").hide();
        $("#signupNickname").val('');
        $("#signupEmail").val('');
        $("#signupPassword").val('');
    });
    
    $('#yourAccountLink').click(function(){
        $("#myModal_signUp").hide();
        $("#myModal").show();
    })

    $(document).on('submit', '#signupForm', function(e) {
        // evito che il submit ricarichi la pagina
        e.preventDefault();

        // costruisco un oggetto con i campi del popup#popupCls_signUp
        var signupObj = {};
        signupObj.nickname = $("#signupNickname").val().trim();
        signupObj.email = $("#signupEmail").val();
        signupObj.password = $("#signupPassword").val().trim();

        // chiamata per l'inserimento a DB
        $.ajax({
            url: 'api_server/signupSystem.php',
            dataType: "json",
            type: 'POST',
            data: {signup: signupObj},
            success: function(data) {
                console.log(data.message);
                $("#popupCls_signUp").click();
                loadPosts();
                alert(data.message);
            },
            error: function(data) {
                console.log(data);
                alert("Errore in fase di registrazione. Nickname o Email già utilizzati.");
            }
        });
    });
});