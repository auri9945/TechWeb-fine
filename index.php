<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--1.Libreria jQuery 
    (file in remoto - La versione remota viene presa da una CDN – Content Delivery Network, 
    cioè un gruppo di server distribuiti su più aree geografiche che possiede copie di contenuti Internet e li consegna 
    in modo veloce e trasparente, )--> 
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


  <!--2.CSS di Bootstrap--> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <!--3.JS di Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!--4.JS di Bootbox <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.3/bootbox.min.js" 
        integrity="sha512-…" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.all.min.js"></script>


  <!--5.CSS con le icone Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- nostro CSS <link href="css/style.css" rel="stylesheet" /> 
  <link rel="stylesheet" type="text/css" href="CSS/stile.css">-->
  <link rel="stylesheet" href="CSS\stile.css">

   
<!--TITOLO PAGINA-->

<title>CIME blog</title>


<!--LOGIN-->
<script>
  $(document).ready(function(){

    // SCRIPT POP UP LOGIN
    $("#your_account").click(function() {
      // Prendi il popup del login tramite ID - JQuery
      $("#myModal").show();
    });

    $("#popupCls").click(function() {
      // Prendi il popup del login tramite ID - JQuery
      $("#myModal").hide();
      $("#myModal").find("#username").val('');
      $("#myModal").find("#password").val('');
    });
    // FINE SCRIPT POP UP LOGIN

  });

</script>

<!--SIGN UP-->
<script>
        $(document).ready(function(){

          // SCRIPT POP UP CREATE POST
          $("#SignUpBtn").click(function() {
            // Prendi il popup del login tramite ID - JQuery
            $("#myModal").hide();
            $("#myModal_signUp").show();
          });

          $("#popupCls_signUp").click(function() {
            // Prendi il popup del login tramite ID - JQuery
            $("#myModal_signUp").hide();
            $("#myModal_signUp").find("#username").val('');
            $("#myModal_signUp").find("#password").val('');
          });
          // FINE SCRIPT POP UP CREATE POST

        });

      </script>

<!--CREATE POST-->
<script>
        $(document).ready(function(){

          // SCRIPT POP UP CREATE POST
          $("#myBtnPost").click(function() {
            // Prendi il popup del login tramite ID - JQuery
            $("#myModalPost").show();
          });

          $("#popupClsPost").click(function() {
            // Prendi il popup del login tramite ID - JQuery
            $("#myModalPost").hide();
            $("#myModalPost").find("#title").val('');
            $("#myModalPost").find("#materie").val('');
            $("#myModalPost").find("#content").val('');
          });
          // FINE SCRIPT POP UP CREATE POST

        });
</script>
</head>

<body>

  <!-- INCLUDE FILE PHP ESTERNI -->
  <?php 
    include 'database\database.php';
    include 'model\post.php';
  ?>

  <!-- NAVBAR CON LIBRERIA BOOTSTRAP-->
<header>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.php">
      <h1>CIME blog</h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> 
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Chi siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contatti</a>
        </li>        
      </ul>
        
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn">
            <span title="Ricerca">
              <i class="fa fa-search" aria-hidden="true"></i>
            </span>
          </button>
      </form>
      <button class="btn" id="your_account"> 
        <span title="Login">
          <i class="fa fa-user-o" aria-hidden="true"></i>
        </span>
      </button>

    </div>
  </nav>
  <!-- FINE NAVBAR CON LIBRERIA BOOTSTRAP-->


<!-- CREA POST CONTENITORE-->

<div class="Crea_post ">
        <h1>CREA IL TUO POST</h1>
          <p>esprimi (non sopprimi) la tua opinione qui su Cime blog!</p>
        <div>
          <button href="#" id="myBtnPost" class="myBtnPost btn-post"> + Crea Post</button>
        </div>
      </div>

        <!-- POP UP CREATE POST-->
        <div id="myModalPost" class="modal">

        <!-- pop up POST content -->
        <div class="modal-content">
          
                <form class="form">
              <p class="form-title">Crea il tuo post</p>
                <div class="input-container">
                  <input type="title" placeholder="Titolo">
                  <span>
                  </span>
              </div>
              <div class="input-container">
                  <select type="materie">
                    <option value="materia" disabled>scegli la materia</option>
                    <option value="materia">Materia 1</option>
                    <option value="materia">Materia 2</option>
                    <option value="materia">Materia 3</option>
                    <option value="materia">Materia 4</option>
                  </select>
                </div>
              <div class="input-container">
                  <input style="height: 200px;" 
                  type="Content" placeholder="scrivi qui il tuo post">
                </div>
                <button type="submit" class="submit">
                Pubblica post
              </button>
          </form>
                <button id="popupClsPost" class="close">Chiudi
                </button>

        </div>
        </div>
<!-- FINE CREA POST CONTENITORE-->

</header>


<!-- CONTENUTO DELLA PAGINA-->     
  <div class="container">
    <div class="page-content">

      <!-- POP UP LOGIN-->
      <div id="myModal" class="modal">

            <!-- pop up login content -->
            <div class="modal-content">
              
        <form class="form">
                <p class="form-title">Sign in to your account</p>
                  <div class="input-container">
                    <input type="email" placeholder="Enter email">
                    <span>
                    </span>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Enter password">
                  </div>
                  <button type="submit" class="submit">
                  Sign in
                </button>

                <p class="signup-link">
                  No account?
                  <a href="#" id="SignUpBtn">Sign up</a>
                </p>
        </form>
          <button id="popupCls" class="close">Chiudi
          </button>

        </div>
      </div>

       <!-- POP UP SIGNUP-->
       <div id="myModal_signUp" class="modal">

          <!-- pop up SIGNUP content -->
          <div class="modal-content">
            
              <form class="form">
                  <p class="form-title">Sign Up</p>
                    <div class="input-container">
                      <input type="email" placeholder="Enter email">
                      <span>
                      </span>
                  </div>
                  <div class="input-container">
                      <input type="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="submit">
                    Sign up
                  </button>

                  <p class="signup-link">
                    Hai già un account?
                    <a href="#" id="your_account">Login</a>
                  </p>
              </form>
              <button id="popupCls_signUp" class="close">Chiudi
              </button>

          </div>
        </div>






 <!-- PAGE CONTENT POST-->

 
<div class="row">
    
      <!--POST MOSTRATI DINAMICAMENTE, IN BASE AI DATI SUL DB (ILA)-->
      <?php
        $result = retrievePublicationsData();
        foreach($result as $postData) {
      ?>

    <div class="col-4 d-flex justify-content-center align-content-center">
      <div class="card">
        <div class="row">
          <div class="col-7"><h3 class="card__materia"> 
            <?php print($postData -> getSubject()); ?>
          </h3></div>
          <div class="col-2 card_modifica"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></div>
          <div class="col-3 card_elimina"> <svg  xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></div>
        </div>
        <p class="card__content"> <?php print($postData -> getContent()); ?> </p>
        <div class="card__user"> <?php print($postData -> getUser()); ?></div>
        <div class="card__arrow"> <!--READ MORE-->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15" >
            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
          </svg>
        </div>
      </div>
    </div>
      <?php 
        }
      ?>

  
</div>

</body>
</html>