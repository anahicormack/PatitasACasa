<?php
require_once('funcionesProyectoFinal.php');

if(!estaLogueado()) {
  header('location: registroLogIn.php');
  exit;
}
if (isset($_GET['logout']))
{
  session_destroy();
  setcookie('id', null, time() - 3600);
  header('Location: registroLogIn.php');
}

 ?>
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
    <title>Mi Perfil</title>
  </head>
  <body>
    <?php
      require_once("header.php");
     ?>
     <div class="containerperfil">
       <div class="container-fluid">



        <h2>Bienvenido a tu perfil<h2>
        <h2>Mi información<h2>
        <h2><a href="mascotas.php?misMascotas" class="mismascotas">Mis mascotas en adopción</a></h2>
        <h2><a href="formMascota.php">Subir mascotas</a></h2>



      </div>
    </div>
  <?php
    require_once("footer.php");
   ?>

  <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>
