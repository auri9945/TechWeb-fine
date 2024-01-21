// login
$(document).ready(function(){

  // SCRIPT POP UP LOGIN
  $("#login_btn").click(function() {
    document.getElementById('login_err_container').style.visibility = "hidden";
    $("#login_err_container").hide();

    // prendi il popup del login per mostrarlo tramite ID - JQuery
    $("#myModal").show();
  });
  
  $("#popupCls").click(function() {
    // Prendi il popup del login per nasconderlo tramite ID - JQuery
    $("#myModal").hide();
    $("#loginEmail").val('');
    $("#loginPassword").val('');
    document.getElementById('login_err_container').style.visibility = "hidden";
    $("#login_err_container").hide();
  });
  // FINE SCRIPT POP UP LOGIN
    
  $(document).on('submit', '#loginForm', function(e) {
    // evito che il submit ricarichi la pagina
    e.preventDefault();

    // costruisco un oggetto con i campi del popup#popupCls_signUp
    var loginObj = {};
    loginObj.email = $("#loginEmail").val().trim();
    loginObj.password = $("#loginPassword").val().trim();

    // chiamata per l'inserimento a DB
    $.ajax({
        url: 'api_server/loginSystem.php',
        dataType: "json",
        type: 'POST',
        data: {login: loginObj},
        success: function(data) {
            location.reload(true);
        },
        error: function(data) {
          if(data.responseJSON) {
            console.log(data.responseJSON.message);
            $("#login_err_container").text(data.responseJSON.message);
            document.getElementById('login_err_container').style.removeProperty("visibility");
            $("#login_err_container").show();
          } else {
            console.log(data);
          }
        }
    });
  });
});