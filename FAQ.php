<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--bt cdn-->
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet"> <!--ionicons-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600" rel="stylesheet"> <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/EstilosJose.css"> <!--CSS-->

    <title>Preguntas Frecuentes</title>
  </head>
  <body background="img/huesitos.png"> <!--"background: no-repeat center center/cover"-->

<!--HEADER-->
  <?php
    require_once("header.php");
   ?>
<!--FIN HEADER-->

<!--PREGUNTAS-->
  <div class="container-preguntas">
      <div class="preguntas-titulo">
        <h1> PREGUNTAS FRECUENTES </h1>
      </div>
        <div class= "preguntas-opciones">
          <div class="opcion">
            <a href="PreguntasAdopcion.php">
              <div class="opcion-imagen">
                <img src="img/adopta.png">
              </div>
              <div class="opcion-texto">
              <h2> ADOPTAR </h2>
              </div>
            </a>
            </div>
            <div class="opcion">
              <a href="construction.php">
                <div class="opcion-imagen">
                  <img src="img/rescata.png">
                </div>
                <div class="opcion-texto">
                  <h2> RESCATAR </h2>
                </div>
              </a>
            </div>
              <div class="opcion">
                <a href="construction.php">
                  <div class="opcion-imagen">
                    <img src="img/dona.png">
                  </div>
                  <div class="opcion-texto">
                    <h2> DONAR </h2>
                  </div>
                </a>
              </div>
          </div>
        </div>
  </div>
<!--FIN PREGUNTAS-->
<!--FOOTER--> <!-- Aca habria que insertar el archivo footer.html con PHP include_once, y borrar el codigo-->
<?php
  require_once("footer.php");
 ?>
<!--FIN FOOTER-->
<script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>

</script>
  </body>
</html>
