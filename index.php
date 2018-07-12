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
    <link rel="stylesheet" href="css/EstilosJose.css"> <!--CSS-->
    <title>Patitas a casa</title>
  </head>
  <body>

    <!--HEADER-->
        <?php
        require_once("header.php");
         ?>
  <!--FIN HEADER-->

  <!--INDEX-->
    <div class ="espacio01"> </div>
    <div class ="containerBusqueda">
      <div class ="busquedaMascota">
        <img src="img/dogbanner02.jpg" alt="dog01" width=100% class="imgDog">

        <div class="containerFormulario">
          <form action= "script.php" method="post" class="formularioBusqueda">
            <div class="container-fluid">
            <label> ESTOY BUSCANDO...</label>
            </div>
            <div class="container-fluid">
            <div>
                <select class="selectpicker"  title="ANIMAL" data-width="40%">
                  <option>PERRO</option>
                  <option>GATO</option>
                </select>
              </div>
              <div class="select01">
                <select class="selectpicker" title="ZONA" data-width="40%">
                  <option>CABA</option>
                  <option>GBA Zona Norte</option>
                  <option>GBA Zona Sur</option>
                  <option>GBA Zona Este</option>
                  <option>GBA Zona Oeste</option>
                  <option>Otro</option>
                </select>
                <select class="selectpicker"  title="EDAD" data-width="40%">
                  <option>0 - 3 años</option>
                  <option>3 - 10 años</option>
                  <option> + 10 años</option>
                </select>
            </div>
            <div class="select02">
                <select class="selectpicker"  title="TAMAÑO" data-width="40%">
                  <option>Chico</option>
                  <option>Mediano</option>
                  <option>Grande</option>
                </select>
                <select class="selectpicker"  title="SEXO" data-width="40%">
                  <option>Hembra</option>
                  <option>Macho</option>
                </select>
            </div>
              <div>
              <a href="construction.html"><button type="button" class="btn btn-warning" id="btnBuscar"> ¡BUSCAR! </button></a>
              </div>
          </div>
          </form>
        </div>

      </div>
    </div>
  <!--FIN INDEX-->
    <div class ="espacio01"> </div>
  <!--FOOTER-->
  <?php
    require_once("footer.html");
   ?>
  <!--FIN FOOTER-->

    <script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

      </body>
    </html>


    <!--
    Hacer boton que suba:
    <a href="#logo"> <button> ioicon de flechita </button> </a>
     -->
