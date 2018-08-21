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

require_once("header.php");

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

   <div class="containerPerfil">
    <h2 class="mascotasUsuario3">¡BIENVENIDO A TU PERFIL!</h2>

    <div class="perfilUsuario">

      <div class="imgUser">
          <a href="construction.php"><img src= "img/add-user.svg" alt="" width="150px"></a> <!--FALTA IMG DE USUARIO EN DB-->
      </div>
<div class="userDB">
      <div class="nombreUsuario">
        <div class="userData"><h2><?=$usuario->getAttr('name')?></h2></div>
        <div class="userData"><h2><?=$usuario->getAttr('lastname')?></h2></div>
      </div>

      <div class="mailUsuario">
        <?=$usuario->getAttr('email')?>
        </div>

            <div class="descripcionUsuario"> <!--FALTA DESCRIPCION DE USUARIO EN DB-->
              <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, cras aliquam blandit elementum mi pretium feugiat leo, facilisi id felis dui congue fames. In vivamus porttitor ut pellentesque venenatis congue primis natoque ultricies, conubia phasellus faucibus quisque consequat morbi nam donec, curabitur habitasse taciti pulvinar auctor dui euismod rutrum. </p>
            </div>
</div>

<div class="userBtns01">

            <div>
              <a href="construction.php" class="actualizarUsuario"> Editar Mi Perfil <ion-icon name="create"></ion-icon> </a>
            </div> <!--Vamos a tener que hacer una pagina para editar usuario-->
            <div>
              <a href="construction.php" class="eliminarUsuario"> Eliminar Mi Usuario <ion-icon name="trash"></ion-icon> </a>
            </div> <!--Vamos a tener que hacer un metodo para eliminar usuario-->
</div>


</div>
  <div class="userBtnsDiv">
<div class="userBtns02">
  <div>
    <a href="mascotas.php?misMascotas" class="mascotasUsuario2"> MIS MASCOTAS EN ADOPCION <ion-icon name="paw"></ion-icon></a>
  </div>
  <div>
  <a href="formMascota.php" class="mascotasUsuario"> SUBIR MASCOTAS <ion-icon name="add"></ion-icon> </a>
  </div>
  <div>
    <a href="index.php" class="mascotasUsuario"> BUSCAR MASCOTAS <ion-icon name="search"></ion-icon> </a>
  </div>
</div>
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
