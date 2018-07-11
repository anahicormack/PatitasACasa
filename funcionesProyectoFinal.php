<?php

session_start();

function esLogin($data) {
  return isset($data["email-login"]) && isset($data["password-login"]);
}

function validar($info){

$errores = [];

$name = trim($info['name']);
$lastname = trim($info['lastname']);
$email = trim($info['email']);
$country = $info['country'];
$password = trim($info['password']);
$rpassword = trim($info['rpassword']);

if ($name == '') {
    $errores['name'] = 'Debes completar tu nombre';
}
if ($lastname == '') {
    $errores['lastname'] = 'Debes completar tu apellido';
}
if ($email == '') {
    $errores['email'] = 'Debes completar tu email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Debes ingresar un formato válido de email';
} elseif (existeEmail($email)) {
      $errores['email'] = 'Esta dirección de email ya existe para otro usuario';
  }
if ($country == '') {
    $errores['country'] = 'Debes completar tu pais de residencia';
}
if ($password == '' || $rpassword == '') {
    $errores['password'] = 'Debes completar tu contraseña';
} elseif ($password !== $rpassword) {
    $errores['password'] = 'Tus contraseñas no coinciden';
  }
return $errores;
}

function crearArrayUsuario($info, $nombreFoto){
  $ext = pathinfo($_FILES[$nombreFoto]['name'], PATHINFO_EXTENSION);
  $usuario =  [
    'id' => traerUltimoID(),
    "name" => $info["name"],
    "lastname" => $info["lastname"],
    "email" => $info["email"],
    "country" => $info["country"],
    "password" => password_hash($info["password"], PASSWORD_DEFAULT),
    'src' => 'uploadsProyectoFinal/'.traerUltimoID().'.'.$ext,
  ];
  return $usuario;
}


function guardarUsuario($usuario){
    $usuarioJSON = json_encode($usuario);
    file_put_contents("usuarios.json", $usuarioJSON. PHP_EOL, FILE_APPEND);
  }

function traerTodos(){
  $usuariosPHP = [];

  $usuarioJSON = file_get_contents("usuarios.json");

  $usuariosArrayJSON = explode(PHP_EOL, $usuarioJSON);
  foreach($usuariosArrayJSON as $value){
    $usuariosPHP[] = json_decode($value, true);
  }
  array_pop($usuariosPHP);
  return $usuariosPHP;
}

function existeEmail($email) {
  $usuarios = traerTodos();
  foreach ($usuarios as $unUsuario){
    if($email == $unUsuario["email"]) {
      return $unUsuario;
      }
    }
    return false;
  }

function existeEmailYPassword($email, $password) {
  $usuarios = traerTodos();

  foreach ($usuarios as $unUsuario){
    if($email == $unUsuario["email"] && password_hash($password, PASSWORD_DEFAULT)){
      return $unUsuario;
      }
    }
  return false;
}


function traerUltimoID() {
  $usuarios = traerTodos();

  if(count($usuarios) == 0){
      return 1;
  }
  $ultimoUsuario = array_pop($usuarios);
  $ultimoID = $ultimoUsuario["id"];
  return $ultimoID + 1;
}

function guardarImagen($inputFoto){
    $errores = [];

    if ($_FILES[$inputFoto]['error'] === UPLOAD_ERR_OK) {
        $nombreDelArchivo = $_FILES[$inputFoto]['name'];
        $ext = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
        $archivo = $_FILES[$inputFoto]['tmp_name'];

        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
            $dondeEstoy = dirname(__FILE__);
            $dondeLoVoyAGuardar = $dondeEstoy . DIRECTORY_SEPARATOR . uploadsProyectoFinal . DIRECTORY_SEPARATOR . traerUltimoID().'.'.$ext;
            move_uploaded_file($archivo, $dondeLoVoyAGuardar);
        }else {
            $errores[$inputFoto] = 'Sube tu foto con un formato valido';
        }

    }else{
        $errores[$inputFoto] = 'No has subido ninguna foto';
    }

    return $errores;
}

function validarLogin($data) {
  $arrayADevolver = [];
  $emailLogin = trim($data['email-login']);
  $passwordLogin = trim($data['password-login']);

  if ($emailLogin == '') {
    $arrayADevolver['email-login'] = 'Completá tu email';
  } elseif (!filter_var($emailLogin, FILTER_VALIDATE_EMAIL)) {
    $arrayADevolver['email-login'] = 'Debes ingresar un formato válido de email';
  }
  if ($passwordLogin == '') {
    $arrayADevolver['password-login'] = 'Debes completar tu contraseña';
  }
  return $arrayADevolver;
}

function loguear($usuario) {
  $_SESSION["id"] = $usuario["id"];
}

function traerPorId($id){
  $todos = traerTodos();

  foreach ($todos as $usuario) {
    if ($id == $usuario['id']) {
      return $usuario;
    }
  }

  return false;
}

function estaLogueado() {
  if (isset($_COOKIE["id"])){
    loguear(traerPorId($_COOKIE["id"]));
  }

  if(isset($_SESSION["id"])){
    return traerPorId($_SESSION["id"]);
  }
}


?>
