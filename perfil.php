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
    <title></title>
  </head>
  <body>
  <h1>  Bienvenido a tu perfil<h1>
    <a href="perfil.php?logout">Cerrar sesión</a>

  </body>
</html>
