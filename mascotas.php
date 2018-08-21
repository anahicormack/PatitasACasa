<?php
require_once('funcionesProyectoFinal.php');

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
    <title>Mascotas</title> <!--porque no funciona???-->
  </head>
  <body>

    <?php require_once("header.php");?>
    

    <?php if (isset($_GET['misMascotas'])): ?>
      <div class="register" id="mascotastitleDiv"><h2 class="mascotastitle">MIS MASCOTAS EN ADOPCION</h2></div>
    <?php else: ?>
      <div class="register" id="mascotastitleDiv"><h2 class="mascotastitle">MASCOTAS EN ADOPCION</h2></div>
    <?php endif; ?>

      <div class="containerM">
        <div class="containerMascotas">
          <?php foreach ($mascotas as $value):?>

        <!--/*$value->getAttr('id'), NO HACE FALTA VERLO-->
      <!--/$value->getAttr('img'),-->
        <!--/$value->getAttr('tipo'),NO HACE FALTA SE VE-->
        <!--$value->getAttr('sexo'), COLOR Y SIMBOLO-->
        <!--DESCRIPCION AGREGAR AL FORMULARIO-->


            <div class="containerMascota">
              <div class="imgMascota"> <!--ACA METER LA FOTO DE LA DB-->
                <?php if($value->getAttr('tipo')=="perro"):?>
                   <img src="img/dog-round.svg" alt="" width="250px">
                <?php elseif ($value->getAttr('tipo')=="gato"): ?>
                   <img src="img/cat-round.svg" alt="" width="250px">
                <?php else: ?>
                  <img src="img/cebra-round.svg" alt="" width="250px">
                <?php endif; ?>
              </div>
              <div class="nombreMascota">
                 <?= $value->getAttr('nombre')?>
                 <?php if($value->getAttr('sexo')=="macho"):?>
                    <ion-icon name="male"></ion-icon>
                  <?php else: ?>
                    <ion-icon name="female"></ion-icon>
                   <?php endif; ?>
               </div>
              <div class="datosMascota">
                <div class="edadMascota"> Edad: <?= $value->getAttr('edad')?></div>
                <div class="tamañoMascota"> Tamaño: <?= $value->getAttr('tamanio')?></div>
              </div>
              <div class="descripcionMascota">
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ultricies, enim vehicula nullam duis orci in convallis neque, porta luctus imperdiet laoreet posuere venenatis penatibus.</p>
              </div>
              <div class="botonesMascotas">
                <?php if (isset($_GET['misMascotas'])): ?>

                  <form action="formMascota.php" method="get">
                    <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                    <input class="actualizarBtn" type="submit" name="" value="Actualizar">
                  </form>

                  <form class="" action="" method="post">
                  <input type="hidden" name="eliminar" value="1">
                  <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                  <input  class="eliminarBtn"type="submit" name="Eliminar" value="Eliminar">
                  </form>

                <?php else: ?>
                  <form class="" action="" method="post">
                    <input type="hidden" name="adoptar" value="1" class="adoptarbtn"> <!--AGREGAR TIPO MAIL-->
                    <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
                    <input type="submit" name="" value="¡ADOPTAR!" class="adoptarbtn"<?= $value->getAttr('user_id') == $_SESSION['id'] ? 'disabled="disabled"' : '' ?>
                  </form>
                <?php endif; ?>
              </div>
              </div>
      <?php endforeach; ?>
      </div>
      </div>

      <div class="espacio02"> </div>
      <h2><a href="perfil.php" class="volverPerfil">VOLVER A MI PERFIL</a></h2>
      <div class="espacio02"> </div>



  <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  </body>
</html>

<?php require_once("footer.php"); ?>
