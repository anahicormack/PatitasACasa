<?php
require_once 'classes/DB.php';
require_once 'classes/JSON_DB.php';
require_once 'classes/MySQL_DB.php';
require_once 'classes/Modelo.php';
require_once 'classes/Usuario.php';
require_once 'classes/Animal.php';


session_start();

function esLogin($data) {
  return isset($data["email-login"]) && isset($data["password-login"]);
}

function validar($usuario, $rpassword){

$errores = [];

$rpassword = trim($rpassword);

if ($usuario->getAttr('name') == '') {
    $errores['name'] = 'Debes completar tu nombre';
}
if ($usuario->getAttr('lastname') == '') {
    $errores['lastname'] = 'Debes completar tu apellido';
}
if ($usuario->getAttr('email') == '') {
    $errores['email'] = 'Debes completar tu email';
} elseif (!filter_var($usuario->getAttr('email'), FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Debes ingresar un formato válido de email';
} elseif ($usuario->findXAttr('email',false)) {
      $errores['email'] = 'Esta dirección de email ya existe para otro usuario';
  }
if ($usuario->getAttr('zonaPertenencia') == '') {
    $errores['zonaPertenencia'] = 'Debes completar tu pais de residencia';
}
if ($usuario->getAttr('password') == '' || $rpassword == '') {
    $errores['password'] = 'Debes completar tu contraseña';
} elseif ($usuario->getAttr('password') !== $rpassword) {
    $errores['password'] = 'Tus contraseñas no coinciden';
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
  $_SESSION["id"] = $usuario->getAttr("id");
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
    $usuario = new Usuario();
    $usuario->setAttr('id',$_COOKIE["id"]);
    loguear($usuario->findXAttr('id', true));
  }

  if(isset($_SESSION["id"])){
    $usuario = new Usuario();
    $usuario->setAttr('id',$_SESSION["id"]);
    return ($usuario->findXAttr('id', true));
  }
}

?>
