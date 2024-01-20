// logout
$(document).ready(function(){
    $("#yourAccountLogout").click(function() {
      $.ajax({
            url: 'api_server/logoutSystem.php',
            type: 'GET',
            data: {},
            success: function(data) {
            window.location.reload();
            console.log("logout avvenuto con successo");
            }
        });
    });

    $("#myBtnPostLogin").click(function() {
      $("#myModal").show();
    });
});