// registrazione
$(document).ready(function() {
    // SCRIPT POP UP SIGN UP POST
    $("#SignUpBtn").click(function() {
        // prendi il popup del SIGNUP tramite ID - JQuery
        document.getElementById('login_err_container').style.visibility = "hidden";
        $("#login_err_container").hide();
        $("#myModal").hide();
        $("#loginPassword").val('');
        $("#loginEmail").val('');

        // nascondo totalmente il div contenitore dei messaggi di errore
        document.getElementById('signupSuccContainer').style.visibility = "hidden";
        $("#signupSuccContainer").hide();
        document.getElementById('signupErrContainer').style.visibility = "hidden";
        $("#signupErrContainer").hide();

        // mostro il popup di registrazione
        $("#myModal_signUp").show();
    });
    
    $("#popupCls_signUp").click(function() {
        // prendi il popup del SIGNUP tramite ID - JQuery
        $("#myModal_signUp").hide();
        
        document.getElementById('signupSuccContainer').style.visibility = "hidden";
        $("#signupSuccContainer").hide();
        document.getElementById('signupErrContainer').style.visibility = "hidden";
        $("#signupErrContainer").hide();

        $("#signupNickname").val('');
        $("#signupEmail").val('');
        $("#signupPassword").val('');
    });
    
    $('#yourAccountLink').click(function(){
        $("#myModal_signUp").hide();

        document.getElementById('signupSuccContainer').style.visibility = "hidden";
        $("#signupSuccContainer").hide();
        document.getElementById('signupErrContainer').style.visibility = "hidden";
        $("#signupErrContainer").hide();

        $("#signupNickname").val('');
        $("#signupEmail").val('');
        $("#signupPassword").val('');

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
                loadPosts();
                document.getElementById('signupErrContainer').style.visibility = "hidden";
                $("#signupErrContainer").hide();

                $("#signupNickname").val('');
                $("#signupEmail").val('');
                $("#signupPassword").val('');

                $("#signupSuccContainer").text(data.message);
                document.getElementById('signupSuccContainer').style.removeProperty("visibility");
                $("#signupSuccContainer").show();
            },
            error: function(data) {
                console.log(data);
                
                document.getElementById('signupSuccContainer').style.visibility = "hidden";
                $("#signupSuccContainer").hide();

                $("#signupErrContainer").text(data.responseJSON.message);
                document.getElementById('signupErrContainer').style.removeProperty("visibility");
                $("#signupErrContainer").show();
            }
        });
    });
});