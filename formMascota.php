<?php
$tamañosMascota = ['Grande', 'Mediano', 'Pequeño'];
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
    <div class="register"><h2>QUIERO DAR UNA MASCOTA EN ADOPCION</h2></div>
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="exampleInputNumber">Tipo</label></br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="macho">Gato<br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="hembra">Perro<br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="hembra">Otro<br>
      </div>

    </br>

      <div class="form-group">
        <label for="exampleInputName">Nombre</label>
        <input type="text" class="form-control" id="exampleInputName" name="nombre" aria-describedby="nameHelp"  placeholder="" value="">
      </div>

    <br>

      <div class="form-group">
        <label for="exampleInputNumber">Edad</label>
        <input type="number" class="form-control" id="exampleInputNumber" name="edad" aria-describedby="nameHelp"  placeholder="" value="">
      </div>

    <br>

      <div class='form-group'>
        <label for='pais'>Tamaño</label>
          <select class="form-control select-pais" name="tamaño">
          <option class="select-genero">Elige el tamaño</option>
          <?php foreach($tamañosMascota as $tamaño):?>
            <option value="<?=$tamaño?>"><?=$tamaño?></option>
          <?php endforeach; ?>
        </select>
      </div>

    <br>

      <div class="form-group">
        <label for="exampleInputNumber">Sexo</label></br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="macho">Macho<br>
        <input type="radio" class="form-control" id="exampleInputText" name="sexo" aria-describedby="nameHelp"  placeholder="" value="hembra">Hembra
      </div>

    <br>

      <div><button type="createAccount" class="btn-primary">LISTO! YA PUEDES DAR EN ADOPCIÓN</button></div>

    </form>
    <script type="text/javascript" src="bootstrap.min.js">
    </script>
  </body>
</html>
