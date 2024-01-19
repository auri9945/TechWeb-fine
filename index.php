<?php session_start();?>





<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 1.libreria jQuery
      (file in remoto - La versione remota viene presa da una CDN – Content Delivery Network, 
      cioè un gruppo di server distribuiti su più aree geografiche che possiede copie di contenuti Internet e li consegna 
      in modo veloce e trasparente) --> 
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <!-- 2.CSS di Bootstrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <!-- 3.JS di Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <!-- 4.JS di Bootbox <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.3/bootbox.min.js" 
          integrity="sha512-…" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.all.min.js"></script>


    <!-- 5.CSS con le icone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- nostro CSS <link href="css/style.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="CSS/stile.css"> -->
    <link rel="stylesheet" href="CSS\stile.css">

  <!-- TITOLO PAGINA -->
  <title>CIME blog</title>


  <!-- LOGIN -->
  <!-- quando ultimi la registrazione esce il messaggio che la registrazione è avvenuta con successo sessione inserita nel file registrazione_query.php -->
  <?php if(isset($_SESSION['message'])): ?>
          <div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
        <script>
          (function() {
            // script JavaScript per rimuovere automaticamente il messaggio dopo 3 secondi
            setTimeout(function(){
              document.querySelector('.msg').remove();
            },10000)
          })();
        </script>
        <?php 
          endif;
          // rimuovo il messaggio
          unset($_SESSION['message']);
        ?>

  <!-- script con funzioni condivise -->
  
  <script src="script/app.js"></script>
  <!-- script leggi post -->
  <script src="script/read-posts.js"></script>
  <!-- script leggi materie -->
  <script src="script/read-subjects.js"></script>
  <!-- script cancella post -->
  <script src="script/delete-post.js"></script>
  <!-- script ricerca post -->
  <script src="script/search-post.js"></script>
  <!-- script creazione post -->
  <script src="script/create-post.js"></script>
  <!-- script update post -->
  <script src="script/update-post.js"></script>

<script>
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

</script>


<script>
  $(document).ready(function(){

// SCRIPT POP UP SIGN UP POST
$("#SignUpBtn").click(function() {
  // prendi il popup del SIGNUP tramite ID - JQuery
  $("#myModal").hide();
  $("#myModal_signUp").show();
});

$("#popupCls_signUp").click(function() {
  // prendi il popup del SIGNUP tramite ID - JQuery
  $("#myModal_signUp").hide();
  $("#myModal_signUp").find("#username").val('');
  $("#myModal_signUp").find("#password").val('');
});

$('#yourAccountLink').click(function(){
  $("#myModal_signUp").hide()
  $("#myModal").show()
})
// FINE SCRIPT POP UP CREATE POST

});

</script>

</head>

<body>

  <!-- NAVBAR CON LIBRERIA BOOTSTRAP -->
  <header>
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand">
        <h1>CIME blog</h1>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
          </li>      
        </ul>
          
        <form id="searchForm" class="d-flex" role="search">
          <input class="form-control me-2" type="text" placeholder="Ricerca" name='searchKeywords' aria-label="Search" autocomplete="off">
            <button type="submit" class="btn">
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
    <!-- FINE NAVBAR CON LIBRERIA BOOTSTRAP -->


  <!-- CREA POST CONTENITORE -->

  <div class="Crea_post ">
          <h1>CREA IL TUO POST</h1>
            <p>esprimi (non sopprimi) la tua opinione qui su Cime blog!</p>
          <div>
            <button href="#" id="myBtnPost" class="myBtnPost btn-post"> + Crea Post</button>
          </div>
        </div>

          <!-- POP UP CREAZIONE POST -->
          <div id="myModalPost" class="modal">

          <!-- pop up CONTENUTO POST -->
          <div class="modal-content">
            
            <form class="form" id="createForm">
              <p class="form-title" id="popUpTitle">Crea il tuo post</p>
                <div class="input-container">
                    <input id="createPostTitle" type="title" placeholder="Titolo" autocomplete="off">
                </div>
                <div class="input-container">
                  <select id="createPostSubject">
                    <option value="" disabled selected>Scegli la materia</option>
                  </select>
                </div>
                <div class="input-container">
                    <textarea id="createPostContent" class="input-textarea"
                      placeholder="Scrivi qui il tuo post" autocomplete="off"></textarea>
                </div>
                <button id="createPostSubmit" type="submit" class="submit">
                  Pubblica post 
                </button>
            </form>
            <button id="popupClsPost" class="close">
              Chiudi
            </button>

          </div>
          </div>
  <!-- FINE CREA POST CONTENITORE -->

  </header>

<div>
  <?php
        if(isset($_SESSION['login'] )) 
        { 
          echo "login effettuato";
        }else{
          echo "login non effettuato";
        }

  ?>
</div>

<!-- CONTENUTO DELLA PAGINA -->     
  <div class="container">
    <div class="page-content">

      <!-- POP UP LOGIN -->
      
 <div id="myModal" class="modal">
            <!-- pop up contenuto login -->
            <div class="modal-content">    

        <form action="api_server\loginSystem.php" class="form" method="POST">	
          
                <p class="form-title">Sign in to your account</p>
                  <div class="input-container">
                    <input type="email" placeholder="Enter email" name="email" required>
                    <span>
                    </span>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Enter password" name="password" required>
                  </div>
                  <button type="submit" class="submit" name="login">
                    Login
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

      <!-- FINE login CONTENITORE -->

       <!-- POP UP SIGNUP -->
       <div id="myModal_signUp" class="modal">

          <!-- pop up SIGNUP content -->
          <div class="modal-content">

              <form  action="registrazione_query.php" class="form" method="POST">	
                  <p class="form-title">Sign Up to your account</p>
         
          <!-- messaggio di errore nella registrazione -->
         <?php 
          if (isset($_SESSION['registrazione'])) : ?> 

          <div class="alert_message error">
            <p> 
              <?= $_SESSION['registrazione'];
              unset($_SESSION['registrazione'])
              ?>
              </p>
          </div>

          <?php endif ?>
         
                  <div class="input-container">
                      <input type="nickname" name="nickname" placeholder="Nickname" required>
  
                    </div>


                    <div class="input-container">
                      <input type="email" name="email" placeholder="Enter email" required>
  
                    </div>

                    <div class="input-container">
                      <input type="password" name="password" placeholder="Enter password" required>
                    </div>
                    <button name="registrazione" type= "submit" class="submit">
                    Sign up
                  </button>

                  <p class="signup-link">
                    Hai già un account?
                    <a href="#" id="yourAccountLink">Login</a>
                  </p>
              </form>
              <button id="popupCls_signUp" class="close">Chiudi
              </button>

          </div>
        </div>
        <!-- FINE signup CONTENITORE -->

          <!-- POP UP Update POST -->
          <div id="myModalUpdate" class="modal">

          <!-- pop up UPDATE content -->
          <div class="modal-content">
            
                  <form id="updateForm" class="form">
                <p class="form-title">Modifica il tuo post</p>
                  <div class="input-container">
                    <input id="modificaPostTitle" type="title" placeholder="Titolo" autocomplete="off">
                    <span>
                    </span>
                </div>
                <div class="input-container">
                    <select id="modificaPostSubject" type="materie">
                      <option value="" disabled selected>Scegli la materia</option>
                    </select>
                  </div>
                  <div class="input-container">
                    <textarea id="modificaPostContent" class="input-textarea"
                      placeholder="Scrivi qui il tuo post" autocomplete="off"></textarea>
                  </div>
                  <button id="modificaPostSubmit" type="submit" class="submit" data-post-id="">
                  Aggiorna post
                </button>
            </form>
                  <button id="popupClsUpdate" class="close">
                    Chiudi
                  </button>

          </div>
          </div>
          <!-- FINE update CONTENITORE -->


           <!-- POP UP  CANCELLAZIONE POST -->
           <div id="myModalDelete" class="modal">

          <!-- pop up cancellazione contenuto -->
          <div class="modal-content">
            
          <div class="card_delete">
            <div class="card-content_delete">
              <p class="card-heading_delete">Sicuro di voler eliminare il post?</p>
              <p class="card-description_delete">Eliminando il post perderei il contenuto da te creato</p>
            </div>
            <div class="card-button-wrapper_delete">
              <button id="popupClsDelete" class="card-button secondary">Annulla</button>
              <button id="popupDlsDelete" class="card-button primary" data-post-id="">Elimina post</button> 
            </div>
            <button id="popupClDelete2" class="exit-button">
              <svg height="20px" viewBox="0 0 384 512">
                <path
                  d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                ></path>
              </svg>
            </button>
          </div>


          </div>
          </div>
          <!-- FINE CONTENITORE DI CANCELLAZIONE -->
         
 <!-- PAGE CONTENT POST -->
 
<div class="row" id="postContainer">
<!-- TODO RIMUOVERE ? -->
<!--
  $content = $postData -> getContent();
  $string = strip_tags($content);
  if (strlen($string) >50){
    $stringCut= substr($string,0,50);
    $endPoint = strrpos($stringCut, '');
    $string = $endPoint?substr($stringCut,0,$endPoint):substr($stringCut,0);
    $string.='...';

    echo $string;
  }
-->
  
</div>


</body>
</html>