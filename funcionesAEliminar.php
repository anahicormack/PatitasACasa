<?php
function crearArrayUsuario($info, $nombreFoto){
  $ext = pathinfo($_FILES[$nombreFoto]['name'], PATHINFO_EXTENSION);
  $usuario =  [
    'id' => traerUltimoID(),
    "name" => $info["name"],
    "lastname" => $info["lastname"],
    "email" => $info["email"],
    "zonaPertenencia" => $info["zonaPertenencia"],
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
      if($email == $unUsuario["email"] && password_verify($password, $unUsuario["password"])) {
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
              $dondeLoVoyAGuardar = $dondeEstoy . DIRECTORY_SEPARATOR . 'uploadsProyectoFinal' . DIRECTORY_SEPARATOR . traerUltimoID().'.'.$ext;
              move_uploaded_file($archivo, $dondeLoVoyAGuardar);
          }else {
              $errores[$inputFoto] = 'Sube tu foto con un formato valido';
          }

      }else{
          $errores[$inputFoto] = 'No has subido ninguna foto';
      }

      return $errores;
  }




 ?>
