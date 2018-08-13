<?php

class MySQL_DB extends DB
{
  protected $conn;

  public function __construct($ruta)
  {
    $usuario = 'root';
    $password = '';
    $opciones = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];
    try {
    	$this->conn = new PDO($ruta, $usuario, $password, $opciones);
    }
    catch( PDOException $ErrorEnConexion ) {
    	echo "Se ha producido un error: ".$ErrorEnConexion->getMessage();
    	echo "<br>";
      exit;
    }
  }

  public function insert($modelo, $datos)
  {
    $columnas = '';
    $values = '';

    foreach ($datos as $key => $value) {
      if (in_array($key, $modelo->columns)) {
        $columnas .= $key . ',';
        $values .= '"' . $value . '",';
      }
    }

    $columnas = trim($columnas, ',');
    $values = trim($values, ',');
    $sql = 'insert into '.$modelo->table.' ('.$columnas.') values ('.$values.')';

    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }

  public function findXAttr($modelo, $attr){

    $sql = 'select * from '.$modelo->table.' where '.$attr.' = :value';
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':value', $modelo->datos[$attr]);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function find($modelo, $id){

    $sql = 'select * from '.$modelo->table.' where id = :id';
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function findAll($modelo){
    $sql = 'select * from '.$modelo->table;
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $arrayDeObjetos = [];

    while ($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
      $unObjeto = new Modelo();
      foreach ($fila as $attr => $value) {
        $unObjeto->setAttr($attr, $value);
      }
      $arrayDeObjetos[]=$unObjeto;
    }
    return $arrayDeObjetos;
  }

  function update($modelo, $datos, $id){
    global $db;
    $set = '';

    foreach ($datos as $key => $value) {
      $set .= $key . '="' . $value . '",';
    }

    $set = trim($set, ',');
    $sql = 'update '.$modelo->table.' set ' . $set . ' where id = ' . $id;

    try {
      $stmt = $db->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }
}
