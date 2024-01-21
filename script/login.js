// login
$(document).ready(function(){

    // SCRIPT POP UP LOGIN
    $("#your_account").click(function() {
      // prendi il popup del login per mostrarlo tramite ID - JQuery
      $("#myModal").show();
    });
    
    $("#popupCls").click(function() {
      // Prendi il popup del login per nasconderlo tramite ID - JQuery
      $("#myModal").hide();
      $("#myModal").find("#username").val('');
      $("#myModal").find("#password").val('');
    });
    // FINE SCRIPT POP UP LOGIN
     
    $(document).on('submit', '#loginForm', function(e) {
      // evito che il submit ricarichi la pagina
      e.preventDefault();

      // costruisco un oggetto con i campi del popup#popupCls_signUp
      var loginObj = {};
      loginObj.email = $("#username").val();
      loginObj.password = $("#password").val().trim();

      // chiamata per l'inserimento a DB
      $.ajax({
          url: 'api_server/loginSystem.php',
          dataType: "json",
          type: 'POST',
          data: {login: loginObj},
          success: function(data) {
              console.log(data.message);
              $("#popupCls").click();
              loadPosts();
              alert(data.message);
          },
          error: function(data) {
              console.log(data);
              alert("Errore in fase di login. Email o Password errata");
          }
      });
    });




});