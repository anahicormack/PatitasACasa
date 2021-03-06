<?php
require_once('funcionesProyectoFinal.php');

if(estaLogueado()) {
  header('location: index.php');
  exit;
}

$zonas = ["CABA", "GBA Zona Norte", "GBA Zona Sur", "GBA Zona Este", "GBA Zona Oeste", "Otro"];

$errores = [];

$name = "";
$lastname = "";
$email = "";
$zonaPertenencia = "";
$password = "";
$rpassword = "";
$emailLogin = "";
$passwordLogin = "";

if($_POST){
  if(esLogin($_POST)){
    $emailLogin = trim($_POST["email-login"]);
    $passwordLogin = trim($_POST["password-login"]);

    $errores = validarLogin($_POST);

        if (empty($errores)) {

          $usuario = new Usuario();
          $usuario->setAttr('email',$emailLogin);
          if ($usuario->findXAttr('email', true)){
            if(password_verify($passwordLogin ,$usuario->getAttr('password'))) {
              loguear($usuario);
              if ($_POST["remember"]){
                setcookie("id", $usuario->getAttr("id"), time() + 3600);
              }

             header('location: index.php');
             exit;
            }else {
              $errores[] = 'No estás registrado o verifica que tu usuario y/o contraseña sean correctos';
            }
          }else {
            $errores[] = 'No estás registrado o verifica que tu usuario y/o contraseña sean correctos';
        }
    }
  } else {

    $usuario = new Usuario();

    foreach ($_POST as $attr => $value) {
      $usuario->setAttr($attr, trim($value));
    }

    // lo siguiente lo dejo por el tema de la persistencia
    $name = trim($_POST["name"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $zonaPertenencia = $_POST["zonaPertenencia"];
    $password = trim($_POST["password"]);
    $rpassword = trim($_POST["rpassword"]);

    $errores = validar($usuario, $rpassword);

    if (empty($errores)) {
//  		$errores = guardarImagen('archivo');
  		if (count($errores) == 0) {
        $usuario->setAttr('password',password_hash($usuario->getAttr('password'), PASSWORD_DEFAULT));
        $usuario->save();
        header('Location: registroLogIn.php?registroOK');
      }
    }
  }
  if (count($errores) > 0) {
      $visible = 'flex';
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow|Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
      <meta charset="utf-8">
    <title></title>
  <style>
  * {
    box-sizing: border-box;
  }
     body {
      background-image: url(images/background2.png);
      background-size: 100%;
      padding: 10px 0 10px 0px;
     }
      .main-container {
        background-color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        color: #4a72b0;
        /*width: 50%;*/
        margin: 0px auto;
        padding: 50px;
        border-radius: 15px;
        max-width: 700px;
      }
      h1 {
        font-family: 'Pacifico', cursive;
      }
      h2 {
        font-family: 'Barlow Condensed', sans-serif;
      }
      .logo-container {
        margin-bottom: 10px;
        text-align: center;
      }
      .small-logo {
        width:40%;
        margin-bottom: 0px;
      }
      .header-form {
        /*background-color:#4a72b0;*/
        /*  color: #FFFFFF; */
        font-size: 1.2em;
        text-align: center;
        padding: 10px 20px;
        margin-bottom: 10px;
        margin-top: 0px;
      /*border-radius: 5px; */
      }
      .form-group {
        margin: auto;
      }
      .custom-file {
        margin-top: 20px;
        margin-bottom: 15px;
        font-style: italic;
      }
      .btn-primary {
   			background-color: #EBA23F;
   			color: #FFFFFF;
        width: 100%;
   			font-size: 1.2em;
   			padding: 10px 20px;
   			border: none;
   			border-radius: 50px;
        margin-top: 10px;
        font-family: 'Barlow Condensed', sans-serif;
      }
      .remember-password {
        font-size: 0.7em;
        color: #4a72b0;
        margin-top: 15px;
      }
      .forgot-password {
        font-size: 0.7em;
        color: #4a72b0;
      }
      .register {
        background-color:  #4a72b0;
        color: #FFFFFF;
        margin: 35px 0px 10px 0px;
        padding: 8px;
        border-radius: 50px;
        font-size: 1em;
        text-align: center;
        font-weight: bold;
        font-family: 'Barlow Condensed', sans-serif;
        /*AGREGARLE QUE LLEGUE A LOS BORDES DEL DIV Y NO SEAN REDONDOS*/
      }
      .select-pais {
        font-style: italic;
      }
      .footer-form {
        font-size: 0.7em;
        color: #4a72b0;
        text-align: center;
      }
      .name-in-footer{
        font-family: 'Pacifico', cursive;
      }
      .errors-container {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        left: 0;
        top: 0;
        z-index: 100;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,0.5);
        display: none;
      }
      .errors {
        background-color: rgb(74,114,176,1);
        color: #fff;
        width: 90%;
        max-width: 700px;
        padding: 50px;
        text-align: center;
      }

      .registroOk {
        color: #4a72b0;
        font-family: 'Barlow Condensed', sans-serif;
        text-align: left;
        font-size: 1.4em;
        margin-left: 5px;
      }
    </style>
</head>
<body>
  <?php if(isset($_GET['registroOK'])): ?>
    <style> .registrodiv {display:none;}</style>
    <div class="registroOk">¡Registro Exitoso! <style> .registroOk {display: none;}</style></div>
  <?php endif; ?>
  <div class="errors-container" style="display: <?php echo isset($visible) ? $visible : '' ; ?>">
    <div class="errors"
      <ul>
        <?php foreach ($errores as $error): ?>
          <li><?php echo $error ?></li>
        <?php endforeach; ?>
      </ul>
      <a href="#">CERRAR</a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <form method="post" enctype="multipart/form-data">
          <div class="main-container">
          <div class="logo-container"><a href="index.php"><img src="images/logo.jpeg" alt="mascotas" class="small-logo"></img></a></div>

            <div class="header-form">
              <h2>Bienvenido a<h2><h1>Patitas a casa<h1>
            </div>

            <div class="form-group">
              <div class="register"><h2>INICIAR SESION</h2></div>
              <label for="exampleInputEmail1">Ingresa tu email</label>
              <input type="email" name="email-login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email.com" value="<?=$emailLogin?>">
              <br>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Ingresa tu contraseña</label>
              <input type="password" name="password-login" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                <br>
            </div>

            <div><button type="submit" class="btn-primary">INGRESA</button></div>
              <br>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" value="yes" name="remember">
              <label class="form-check-label" for="exampleCheck1">Recordar usuario</label>
            </div> <!--falta mandarlo para el medio-->
          </form>


          <div><span><a class="forgot-password" href="#">¿Olvidaste tu contraseña?</a></span></div> <!--falta mandarlo para el medio-->
          <div class="registrodiv">
          <div class="register"><h2>REGISTRARME</h2></div>
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputName">Ingresa tu nombre</label>
              <input type="name" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp"  placeholder="Nombre" value="<?=$name?>">
              <br>
            </div>

            <div class="form-group">
              <label for="exampleInputApellido">Ingresa tu apellido</label>
              <input type="name" class="form-control" id="exampleInputlastname" name="lastname" aria-describedby="nameHelp" placeholder="Apellido" value="<?=$lastname?>">
                <br>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Ingresa tu email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?=$email?>">
                <br>
            </div>

            <div class='form-group'>
              <label for='pais'>¿De dónde sos?</label>
              <select class="form-control select-pais" name="zonaPertenencia">
                <option class="select-pais">¿Dónde vives?</option>
                <?php foreach ($zonas as $zona):?>
                  <?php if($zona == $zonaPertenencia): ?>
                    <option selected value="<?=$zona?>"><?=$zona?></option>
                  <?php else: ?>
                    <option value="<?=$zona?>"><?=$zona?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
                <br>
            </div>


            <div class="form-group">
              <label for="exampleInputPassword1">Ingresa tu contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Contraseña">
                <br>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Confirma tu contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="rpassword" placeholder="Confirma tu contraseña">
                <br>
            </div>


                      <div class="form-group">
                          <label for="exampleInputPassword1">Contanos un poco sobre vos</label>
                          <input type="textarea" class="form-control" id="exampleInputPassword1" name="sobreVos" placeholder="¿Quieres adoptar? ¿Quieres dar en adopción? ¿Por qué? ¿Tienes otras mascotas? ...">
                            <br>
                        </div>

            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="archivo">
              <label class="custom-file-label" for="inputGroupFile01">Ingresa tu foto de perfil</label>
                <br>
            </div>

            <div><button type="createAccount" class="btn-primary">CREA TU CUENTA</button></div>
</div>

        </div>
            <br/>

            <div class="footer-form">
              <p> Al registrarme, declaro que soy mayor de edad y acepto los<a href="terminosCondiciones.php"> Términos y condiciones y las Políticas de privacidad </a>de <span class="name-in-footer">Patitas a casa</span></p>
            </div>

    </div>

    </form>
      </div>
    </div>
  </div>


     <script type="text/javascript" src="js/bootstrap.min.js">
     </script>

     <script>
       var errorContainer = document.querySelector('.errors-container');
       var btnClose = errorContainer.querySelector('a');
       console.log(btnClose, errorContainer);
       btnClose.addEventListener('click', function (e) {
         e.preventDefault();
         errorContainer.setAttribute('style', 'display: none;');
       })
     </script>

  </body>
</html>
