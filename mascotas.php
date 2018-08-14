<?php
require_once('funcionesProyectoFinal.php');
require_once("header.php");

//require_once('Usuario.php');

//if(!Usuario::estaLogueado()){
//  header('location: login.php');
  //exit;
//}

$mascota = new Mascota();
if ($_POST) {
  if (isset($_POST['eliminar'])) {
    $mascota->setAttr('id', $_POST['id']);
    $mascota->delete();
  } else {
    $adopcion = new Adopcion();
    $adopcion->setAttr('usuario_id', $_SESSION['id']);
    $adopcion->setAttr('mascota_id', $_POST['id']);
    $adopcion->save();
  }
}

if($_GET) {
  if (isset($_GET['misMascotas'])) {
    $mascotas = $mascota->findMisMascotas();
  } else {
    $mascotas = $mascota->findBy($_GET);
  }
} else {
  $mascotas = $mascota->findAll();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--bt cdn-->
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet"> <!--ionicons-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400" rel="stylesheet"> <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/EstilosJose.css"> <!--CSS-->
    <title>Mascotas</title>
  </head>
  <body>
    <?php
    //include("menu.php");
    ?>
    <?php if (isset($_GET['misMascotas'])): ?>
      <div class="register"><h2 class=>MIS MASCOTAS EN ADOPCION</h2></div>
    <?php else: ?>
      <div class="register"><h2 class="mascotastitle">MASCOTAS EN ADOPCION</h2></div>
    <?php endif; ?>
      <div class="containerM">
      <div class="containerMascotas">
      <?php
      foreach ($mascotas as $value):
      ?>
      <!--HAY QUE CAMBIAR LOS VALORES A MAYUSCULAS-->
        <!--/*$value->getAttr('id'), NO HACE FALTA VERLO-->
      <!--/$value->getAttr('img'),-->
        <!--/$value->getAttr('tipo'),NO HACE FALTA SE VE-->
        <!--$value->getAttr('sexo'), COLOR Y SIMBOLO-->
        <!--DESCRIPCION AGREGAR AL FORMULARIO-->


            <div class="containerMascota">
              <div class="imgMascota"> <!--ACA METER LA FOTO DE LA DB-->
                <img src="img/dog-round.svg" alt="" width="250px">
              </div>
              <div class="nombreMascota"> <?= $value->getAttr('nombre')?> </div>
              <div class="datosMascota">
                <div class="edadMascota"> Edad: <?= $value->getAttr('edad')?></div>
                <div class="tamañoMascota"> Tamaño: <?= $value->getAttr('tamanio')?></div>
              </div>
              <div class="descripcionMascota">
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ultricies, enim vehicula nullam duis orci in convallis neque, porta luctus imperdiet laoreet posuere venenatis penatibus.</p>
              </div>
              <div>
                <?php if (isset($_GET['misMascotas'])): ?>
                  <form class="" action="" method="post">
                  <input type="hidden" name="eliminar" value="1">
                  <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                  <input type="submit" name="Eliminar" value="Eliminar">
                  </form>
                  <form class="" action="formMascota.php" method="get">
                    <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                    <input type="submit" name="" value="Actualizar">
                  </form>
                <?php else: ?>
                  <form class="" action="" method="post">
                    <input type="hidden" name="adoptar" value="1" class="adoptarbtn"> <!--AGREGAR TIPO MAIL-->
                    <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                    <input type="submit" name="" value="¡ADOPTAR!" class="adoptarbtn"<?= $value->getAttr('user_id') == $_SESSION['id'] ? 'disabled="disabled"' : '' ?>
                  </form>
                <?php endif; ?>
              </div>
      <?php endforeach; ?>
      </div>
      </div>
      </div>
  <h2><a href="perfil.php" class="volverbtn">Volver a mi Perfil</a></h2>



  <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  </body>
</html>
