// logout
$(document).ready(function(){
    $("#logout_btn").click(function() {
        $.ajax({
            url: 'api_server/logoutSystem.php',
            type: 'GET',
            data: {},
            success: function(data) {
              location.reload(true);
              console.log("logout avvenuto con successo");
            }
        });
    });

    // bottone che apre il popup per la creazione dei post
    $("#create_post_login_btn").click(function() {
        document.getElementById('login_err_container').style.visibility = "hidden";
        $("#login_err_container").hide();
        $("#myModal").show();
    });
});