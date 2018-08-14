<?php
require_once('funcionesProyectoFinal.php');

$tamaniosMascota = ['Grande', 'Mediano', 'Pequeño'];
$mascota = new Mascota();

if ($_POST) {
  $id = null;
  $mascota->setAttr('user_id', $_SESSION['id']);
  if (isset($_POST['id'])) {
    $mascota->setAttr('id', $_POST['id']);
  }
  if(isset($_POST['tipo'])){
    $mascota->setAttr('tipo', $_POST['tipo']);
  }
  $mascota->setAttr('nombre', $_POST['nombre']);
  $mascota->setAttr('edad', $_POST['edad']);
  $mascota->setAttr('tamanio', $_POST['tamanio']);
  if(isset($_POST['sexo'])){
    $mascota->setAttr('sexo', $_POST['sexo']);
  }

  $errores = $mascota->validar();

    if(empty($errores)) {
      $mascota->save();
    }
}

if (!$_POST && isset($_GET['id'])) {
  $mascota->find($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow|Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(!empty($errores)):?>
    <ul>
      <?php foreach ($errores as $error): ?>
        <li> <?= $error ?> </li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <h2><a href="perfil.php">Volver a mi Perfil</a></h2>
    <div class="register"><h2>QUIERO DAR UNA MASCOTA EN ADOPCION</h2></div>
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="exampleInputNumber">Tipo</label></br>
        <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="gato" <?= $mascota->getAttr('tipo') == 'gato' ? 'checked="checked"' : '' ?>>Gato<br>
        <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="perro" <?= $mascota->getAttr('tipo') == 'perro' ? 'checked="checked"' : '' ?>>Perro<br>
        <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="otro" <?= $mascota->getAttr('tipo') == 'otro' ? 'checked="checked"' : '' ?>>Otro<br>
      </div>

    </br>

      <div class="form-group">
        <label for="exampleInputName">Nombre</label>
        <input type="text" class="form-control" id="exampleInputName" name="nombre" aria-describedby="nameHelp"  placeholder="" value="<?= $mascota->getAttr('nombre') ? $mascota->getAttr('nombre') : '' ?>">
      </div>

    <br>

      <div class="form-group">
        <label for="exampleInputNumber">Edad</label>
        <input type="number"  min="0" class="form-control" id="exampleInputNumber" name="edad" aria-describedby="nameHelp"  placeholder="" value="<?= $mascota->getAttr('edad') ? $mascota->getAttr('edad') : '' ?>">
      </div>

    <br>

      <div class='form-group'>
        <label for='pais'>Tamaño</label>
          <select class="form-control select-pais" name="tamanio">
          <option class="select-genero" value="">Elige el tamaño</option>
          <?php foreach($tamaniosMascota as $tamanio):?>
            <option value="<?=$tamanio?>" <?= $mascota->getAttr('tamanio') == $tamanio ? 'selected="selected"' : '' ?>><?=$tamanio?></option>
          <?php endforeach; ?>
        </select>
      </div>

    <br>

      <div class="form-group">
        <label for="exampleInputNumber">Sexo</label></br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="macho" <?= $mascota->getAttr('sexo') == 'macho' ? 'checked="checked"' : '' ?>>Macho<br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="hembra" <?= $mascota->getAttr('sexo') == 'hembra' ? 'checked="checked"' : '' ?>>Hembra

      </div>
<br>
  <!--AGREGAR DESCRIPCION-->
      <div class="custom-file">
        <label class="custom-file-label" for="inputGroupFile01">Ingresa una foto de la mascota</label>
        <input type="file" class="custom-file-input" id="inputGroupFile01" name="archivo" value="<?= $mascota->getAttr('img') ? $mascota->getAttr('img') : '' ?>">

          <br>
      </div>

      <?php if($mascota->getAttr('id')): ?>
        <input type="hidden" name="id" value="<?= $mascota->getAttr('id') ?>" />
      <?php endif; ?>
    <br>

      <div>
        <?php if($mascota->getAttr('id')): ?>
        <button type="createAccount" class="btn-primary">ACTUALIZAR</button>
      <?php else: ?>
        <button type="createAccount" class="btn-primary">DAR EN ADOPCIÓN</button>
      <?php endif; ?>
      </div>

    </form>
    <script type="text/javascript" src="bootstrap.min.js">
    </script>
  </body>
</html>
