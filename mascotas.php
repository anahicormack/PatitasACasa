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
    <title></title>
  </head>
  <body>
    <?php
    //include("menu.php");
    ?>
    <h2><a href="perfil.php">Volver a mi Perfil</a></h2>
    <?php if (isset($_GET['misMascotas'])): ?>
      <div class="register"><h2>MIS MASCOTAS EN ADOPCION</h2></div>
    <?php else: ?>
      <div class="register"><h2>MASCOTAS EN ADOPCION</h2></div>
    <?php endif; ?>
    <ul>
      <?php
      foreach ($mascotas as $value):
      ?>
      <li>
        <?=$value->getAttr('id') ?>,<?= $value->getAttr('tipo')?>,<?= $value->getAttr('nombre')?>,<?= $value->getAttr('edad')?>,<?= $value->getAttr('tamanio')?>,<?= $value->getAttr('sexo') ?>
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
          <input type="hidden" name="adoptar" value="1">
          <input type="hidden" name="id" value="<?=$value->getAttr('id')?>">
          <input type="submit" name="" value="Adoptar" <?= $value->getAttr('user_id') == $_SESSION['id'] ? 'disabled="disabled"' : '' ?>>
        </form>
      <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>

  </body>
</html>
