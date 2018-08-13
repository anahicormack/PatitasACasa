<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'usuarios.php';

    // Probando usuarios
    $usuarios = usuarios::getTodes();

    foreach ($usuarios as $unUsuario) {
      echo $unUsuario->getName();
      echo("<br>");
    }

    ?>


  </body>
</html>
