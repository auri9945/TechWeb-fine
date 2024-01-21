<?php session_start();?>

<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 1.CSS di Bootstrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- 2.CSS con le icone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- nostro CSS -->
    <link rel="stylesheet" href="CSS\stile.css">
    
    <!-- 3.libreria jQuery
      (file in remoto - La versione remota viene presa da una CDN – Content Delivery Network, 
      cioè un gruppo di server distribuiti su più aree geografiche che possiede copie di contenuti Internet e li consegna 
      in modo veloce e trasparente) --> 
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- 4.JS di Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- 5.JS di Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.all.min.js"></script>


    <!-- TITOLO PAGINA -->
    <title>CIME blog</title>

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
    <!-- script aggiornamento post -->
    <script src="script/update-post.js"></script>
    <!-- script registrazione -->
    <script src="script/signup.js"></script>
    <!-- script accesso -->
    <script src="script/login.js"></script>
    <!-- script disconnessione -->
    <script src="script/logout.js"></script>

  </head>

  <body>

    <!-- INIZIO NAVBAR CON LIBRERIA BOOTSTRAP -->
    <header>
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
          <h1>CIME blog</h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_supported_content" aria-controls="navbar_supported_content" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> 
        </button>
        
        <div class="collapse navbar-collapse" id="navbar_supported_content">
        
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                Homepage
              </a>
            </li>      
          </ul>
            
          <form id="search_form" class="d-flex" role="search">
            <input class="form-control me-2" type="text" placeholder="Ricerca" name='searchKeywords' aria-label="Search" autocomplete="off">
            <button type="submit" class="btn">
              <span title="Ricerca">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </button>
          </form>

          <?php 
            // se l'utente ha una sessione attiva mostro il bottone di logout altrimenti mostro il bottone per il login
            if(!isset($_SESSION["nickname"])) {
              echo '<button class="btn" id="login_btn"> 
                      <span title="Login">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                      </span>
                    </button>';
            } else {
              echo '<button class="button button4" id="logout_btn">Logout</button>';
            }
          ?>

        </div>
      </nav>
      <!-- FINE NAVBAR CON LIBRERIA BOOTSTRAP -->


      <!-- CREA POST CONTENITORE -->
      <div class="Crea_post ">
        <h1>Dai vita alla tua opinione</h1>
        <p>Questo è uno spazio dedicato a tutti gli studenti iscritti al corso di studio in Comunicazione, ICT e Media dell'Università di Torino.
          <br> 
            Qui potrai esprimere la tua opinione, dare consigli ad altri studenti o ai futuri studenti e informazioni utili sulle materie di questo corso di studio.
          <br>
            La tua opinione è importante, condividila con noi!
          <br> 
            Inizia subito a creare un post.
        </p>
        <div>

          <?php
            // se l'utente ha una sessione attiva abilito il bottone per la creazione dei post, altrimenti lo indirizzo al login
            $buttonId = '';
            if(isset($_SESSION["email"]) && isset($_SESSION["nickname"])) { 
              $buttonId = 'create_post_btn';
            } else {
              $buttonId = 'create_post_login_btn';
            }
            echo '<button id="'.$buttonId.'" class="myBtnPost btn-post">+ Crea Post</button>';
          ?>

        </div>
      </div>

      <!-- POP UP CREAZIONE POST -->
      <div id="modal_post" class="modal">
        <!-- pop up contenuto post -->
        <div class="modal-content">
              
          <form class="form" id="create_post_form">
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
                <textarea id="createPostContent" class="input-textarea" placeholder="Scrivi qui il tuo post" autocomplete="off"></textarea>
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

    <!-- CONTENUTO DELLA PAGINA -->     
    <div class="container">
      <div class="page-content">

        <!-- POP UP LOGIN -->
        <div id="myModal" class="modal">
          <!-- pop up login content -->
          <div class="modal-content">    
            <form id="loginForm" class="form">	
              <div id="login_err_container" class="alert alert-danger" role="alert"></div>
              <p class="form-title">Accedi al tuo account</p>
              <div class="input-container">
                <input type="email"  id="loginEmail" placeholder="E-Mail *" name="email" required autocomplete="off">
              </div>
              <div class="input-container">
                <input type="password" id="loginPassword" placeholder="Password *" name="password" required>
              </div>
              <button name="login" type="submit" class="submit">
                Accedi
              </button>
              <p class="signup-link">
                Non hai un account? Registrati subito.
                <a href="#" id="SignUpBtn">Registrati</a>
              </p>
            </form>
            <button id="popupCls" class="close">
              Chiudi
            </button>
          </div>
        </div>
        <!-- FINE POP UP LOGIN -->

        <!-- POP UP SIGNUP -->
        <div id="myModal_signUp" class="modal">
          <!-- pop up signup content -->
          <div class="modal-content">
            <form  class="form" id="signupForm">
              <div id="signupSuccContainer" class="alert alert-success" role="alert"></div>
              <div id="signupErrContainer" class="alert alert-danger" role="alert"></div>
              <p class="form-title">Registrati ora</p>        
              <div class="input-container">
                <input type="nickname" id="signupNickname" name="nickname" placeholder="Nickname *" required autocomplete="off">
              </div>
              <div class="input-container">
                <input type="email" id="signupEmail" name="email" placeholder="E-Mail *" required autocomplete="off">
              </div>
              <div class="input-container">
                <input type="password" id="signupPassword" name="password" placeholder="Password *" required>
              </div>
              <button name="registrazione" type= "submit" class="submit">
                Registrati
              </button>
              <p class="signup-link">
                Hai già un account?
                <a href="#" id="yourAccountLink">Accedi</a>
              </p>
            </form>
            <button id="popupCls_signUp" class="close">
              Chiudi
            </button>
          </div>
        </div>
        <!-- FINE POP UP SIGNUP -->

        <!-- POP UP UPDATE POST -->
        <div id="myModalUpdate" class="modal">
          <!-- pop up update content -->
          <div class="modal-content">
            <form id="updateForm" class="form">
              <p class="form-title">Modifica il tuo post</p>
              <div class="input-container">
                <input id="modificaPostTitle" type="title" placeholder="Titolo" autocomplete="off">
              </div>
              <div class="input-container">
                <select id="modificaPostSubject" type="materie">
                  <option value="" disabled selected>Scegli la materia</option>
                </select>
              </div>
              <div class="input-container">
                <textarea id="modificaPostContent" class="input-textarea" placeholder="Scrivi qui il tuo post" autocomplete="off"></textarea>
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
        <!-- FINE POP UP UPDATE POST -->

        <!-- POP UP  CANCELLAZIONE POST -->
        <div id="myModalDelete" class="modal">
          <!-- pop up delete content -->
          <div class="modal-content">  
            <div class="card_delete">
              <div class="card-content_delete">
                <p class="card-heading_delete">Sicuro di voler eliminare il post?</p>
                <p class="card-description_delete">Eliminando il post perderei il contenuto da te creato</p>
              </div>
              <div class="card-button-wrapper_delete">
                <button id="popupClsDelete" class="card-button secondary">
                  Annulla
                </button>
                <button id="popupDlsDelete" class="card-button primary" data-post-id="">
                  Elimina post
                </button> 
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
          
        <!-- CONTENITORE POST -->
        <div class="row" id="postContainer">
        </div>
        <!-- FINE CONTENITORE POST -->
      </div>
    </div>
  </body>
</html>