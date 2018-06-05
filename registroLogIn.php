<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow|Barlow+Condensed" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  <style>
     * {
       box-sizing: border-box;
     }
     body {
      background-image: url(images/background5.png);
      background-size: 100%;
      padding: 10px 0 10px 0px;
     }
      .main-container {
        background-color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        color: #4a72b0;
        width: 50%;
        margin: 0px auto 0px auto;
        padding: 50px 75px 50px 75px;
        border-radius: 15px;
        text-transform: uppercase;
      }
      h1, h2 {
        font-family: 'Barlow Condensed', sans-serif;
      }
      .logo-container {
        margin-bottom: 10px;
        text-align: center;
      }
      .small-logo {
        width:45%;
      }
      .header-form {
        /*background-color:#4a72b0;*/
        /*  color: #FFFFFF; */
        font-size: 1.2em;
        text-align: center;
        padding: 10px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
      }
      .form-group {
        margin: auto;
      }
      .btn-primary {
   			background-color: #e5b449;
   			color: #FFFFFF;
        width: 100%;
   			font-size: 1.2em;
   			padding: 10px 20px;
   			border: none;
   			border-radius: 15px;
        margin-top: 10px;
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
        border-radius: 15px;
        font-size: 1.2em;
        text-align: center;
        font-weight: bold;
      }
      .footer-form {
        font-size: 0.7em;
        color: #4a72b0;
        text-align: center;
      }
    </style>
</head>
<body>
    <form>

      <div class="main-container">
      <div class="logo-container"><a href="#"><img src="images/logo2.png" alt="mascotas" class="small-logo"></img></a></div>

        <div class="header-form">
          <h1>Bienvenido a<h1>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email.com">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1"></label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
        </div>

        <div><button type="submit" class="btn-primary">INGRESA</button></div>

        <div class="remember-password"><input type="checkbox" checked="checked" name="remember"> Recordar contraseña</div>

        <div><span><a class="forgot-password" href="#">¿Olvidaste tu contraseña?</a></span></div>

        <div class="register"><h2>Registrate</h2></div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Nombre">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="apellido" class="form-control" id="exampleInputApellido" aria-describedby="nameHelp" placeholder="Apellido">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1"></label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1"></label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirma tu contraseña">
        </div>

        <div><button type="createAccount" class="btn-primary">CREA TU CUENTA</button></div>

        <br/>

        <div class="footer-form">
          <p> Al registrarme, declaro que soy mayor de edad y acepto <a href="#">los Términos y condiciones y las Políticas de privacidad </a>de xxxxxxxxx</p>
        </div>

</div>

</form>

     <script type="text/javascript" src="js/bootstrap.min.js">
     </script>

  </body>
</html>
