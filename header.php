<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- bt cdn-->
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet"> <!-- ionicons-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600" rel="stylesheet"> <!-- google fonts-->
<link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Leckerli+One|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/EstilosJose.css"> <!--CSS-->
    <title>Header</title>
  </head>

  <body>

  <?php
  include_once('funcionesProyectoFinal.php');
  ?>

<div class ="mi-header">
<div class="container-fluid">
  <header class="main-header">
      <div class="header-top">
          <img src="img/logo.png" alt="logotipo" class="logo" width="200px" class="img-responsive">
      </div>
    <nav class="main-nav">
      <a href="#" class="toggle" id="toggle-lines">
        <label for="abrirMenu">
          <span class="ion-navicon-round"><ion-icon name="menu"></ion-icon></span>
        </label>
      </a>
      <input type="checkbox" id="abrirMenu">
      <ul id="header-ul">
        <li><a href="Index.php">INICIO</ion-icon></a></li> <!--Cambiar a index.php-->
        <li><a href="FAQ.php">PREGUNTAS FRECUENTES</a></li>
        <li><a href="construction.php">ADOPTAR UN PERRO</a></li>
        <li><a href="construction.php">ADOPTAR UN GATO</a></li>
        <li><a href="construction.php">ANTES Y DESPUES</a></li>

<!-- Si esta logueado, mostrarme un echo del nombre y mandarlo a su perfil-->
<?php if (estaLogueado()):?>
  <?php $usuario = traerPorID($_SESSION['id'])?>
        <li> <a href="perfil.php"><button type="button" class="btn btn-warning"> <?=$usuario['name']?> </button> </a> </li>

<!-- Si no esta logueado mostrarme el boton de Log In y mandarlo a registrarse-->
  <?php else: ?>
        <li><a href="registroLogIn.php"><button type="button" class="btn btn-warning"><ion-icon name="paw"></ion-icon> LOG IN</button></a></li>
<?php endif; ?>

      </ul>
    </nav>
  </header>
</div>
</div>

<!--

No va, para ver como queda con el footer sumado:

<div id="ejemplo-div">
</div>

<div clas="mi-footer" id="mi-footer">
<div class ="container-fluid">
  <footer class="main-footer" >
    <div class="container">
      <div class= "footer1">
        <form action= "script.php" method="post">
          <div class="row">
            <div class= "col-12 col-s-12 col-md-12 col-lg-5">
              <label for="email-input" id="label-footer"> ¡NO TE PIERDAS NUESTRAS NOTICIAS! </label>
            </div>
            <div class= "col-12 col-s-12 col-md-12 col-lg-4">
              <input type="email" placeholder="E-mail" name="correo">
            </div>
            <div class= "col-12 col-s-12 col-md-12 col-lg-3">
              <button type="button" class="btn btn-warning" class="suscribe-btn"> <a href="mailto:jose_herrera97@icloud.com"> SUSCRIBIRME </a> </button>
            </div>
          </div>
      </form>
      </div>


      <a href= "https://www.facebook.com/" target="_blank"><ion-icon name="logo-facebook" class="fb-icon"></ion-icon></a>
      <a href= "https://www.instagram.com/" target="_blank"><ion-icon name="logo-instagram" class="insta-icon"></ion-icon></a>
      <a href= "https://www.twitterk.com/" target="_blank"><ion-icon name="logo-twitter" class="twitter-icon"></ion-icon></a>
    </div>
    <div class="footer-last">
        <img src="img/logo.png" alt="logotipo" class="logo" class="img-responsive">
    </div>
      </div>
    </div>
  </footer>
</div>
</div>
-->




<script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
  /* global $ */
  /*$('#toggle-lines').click(function() {
    $('#header-ul').slideToggle();
  });*/
</script>
  </body>
</html>
