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
    
});