<?php
require_once('funcionesProyectoFinal.php');
require_once('header.php');

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
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- bt cdn-->
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet"> <!-- ionicons-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600" rel="stylesheet"> <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Leckerli+One|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> <!--select-->
    <link rel="stylesheet" href="css/EstilosFormMascotas.css"> <!--CSS-->
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
  <div class ="espacio01"> </div>
    <div class="containerFormMascotas">
    <div class="formMascotas">
    <h2>QUIERO DAR EN ADOPCION...</h2>
        <form method="post" enctype="multipart/form-data">

      <div>
        <div class="align"><div class="formMascotaTitles"><label for="exampleInputNumber">Tipo de animal</label></div> </div>
        <div class="tiposDiv2">
          <div class="tipoDiv">
            <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="gato" <?= $mascota->getAttr('tipo') == 'gato' ? 'checked="checked"' : '' ?>>Gato<br>
          </div>
          <div class="tipoDiv">
            <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="perro" <?= $mascota->getAttr('tipo') == 'perro' ? 'checked="checked"' : '' ?>>Perro<br>
          </div>
          <div class="tipoDiv">
            <input type="radio" class="form-control" id="exampleInputText" name="tipo" aria-describedby="nameHelp"  placeholder="" value="otro" <?= $mascota->getAttr('tipo') == 'otro' ? 'checked="checked"' : '' ?>>Otro<br>
          </div>
        </div>
      </div>

<div class="formMascota01">
  <div class ="optionMascota">
          <div class="form-group">
          <div class="align"><div class="formMascotaTitles"> <label for="exampleInputName">Nombre</label> </div></div>
            <div class="align"><input type="text" class="form-control" id="exampleInputName" name="nombre" aria-describedby="nameHelp"  placeholder="¿Cómo se llama tu animal?" value="<?= $mascota->getAttr('nombre') ? $mascota->getAttr('nombre') : '' ?>">
            </div>
          </div>
  </div>
  <div class ="optionMascota">
          <div class="form-group">
          <div class="align"><div class="formMascotaTitles"> <label for="exampleInputNumber">Edad</label> </div></div>
            <div class="align"><input type="number"  min="0" class="form-control" id="exampleInputNumber" name="edad" aria-describedby="nameHelp"  placeholder="¿Qué edad tiene tu animal?" value="<?= $mascota->getAttr('edad') ? $mascota->getAttr('edad') : '' ?>"></div>
          </div>
  </div>
</div>

<div class="formMascota01">
  <div class ="optionMascota">
          <div class='form-group'>
            <div class="align"><div class="formMascotaTitles"> <label for='pais'>Tamaño</label></div></div>
                  <div class="align"><select class="form-control select-pais" name="tamanio">
              <option class="select-genero" value="">¿Qué tamaño tiene tu animal?</option>
              <?php foreach($tamaniosMascota as $tamanio):?>
                <option value="<?=$tamanio?>" <?= $mascota->getAttr('tamanio') == $tamanio ? 'selected="selected"' : '' ?>><?=$tamanio?></option>
              <?php endforeach; ?>
            </select></div>
          </div>
  </div>
  <div class ="optionMascota">
          <div class="form-group">
            <div class="align"><div class="formMascotaTitles"><label for="exampleInputNumber">Sexo</label></br> </div></div>
              <div class="tiposDiv3">
                <div class="tipoDiv">
            <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="macho" <?= $mascota->getAttr('sexo') == 'macho' ? 'checked="checked"' : '' ?>>Macho
          </div>
              <div class="tipoDiv">
            <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="hembra" <?= $mascota->getAttr('sexo') == 'hembra' ? 'checked="checked"' : '' ?>>Hembra
        </div>
      </div>
      </div>
  </div>
</div>
  <!--AGREGAR DESCRIPCION-->
        <!--  <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Ingresa una foto de tu animal</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="archivo" value="<?= $mascota->getAttr('img') ? $mascota->getAttr('img') : '' ?>">

              <br>
          </div>-->

          <?php if($mascota->getAttr('id')): ?>
            <input type="hidden" name="id" value="<?= $mascota->getAttr('id') ?>" />
          <?php endif; ?>
          <br>

          <div>
            <?php if($mascota->getAttr('id')): ?>
              <button type="createAccount" class="btn-primary">ACTUALIZAR</button>
            <?php else: ?>
              <button type="createAccount" class="btn btn-warning" id="darBtn">SUBIR MASCOTA</button>
            <?php endif; ?>
          </div>

        </form>
      </div>
      </div>

      <h2><a href="perfil.php" class="volverPerfil">VOLVER A MI PERFIL</a></h2>
      <div class="espacio02"> </div>
        <div class ="espacio01"> </div>

      <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" src="bootstrap.min.js">
    </script>
  </body>
</html>
<?php require_once('footer.php'); ?>
