<?php

class MySQL_DB extends DB
{
  protected $conn;

  public function __construct($ruta)
  {
    $usuario = 'root';
    $password = 'root';
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

  public function findBy($modelo, $filtros){
    $sql = 'select * from '.$modelo->table;
    $sqlWhere = '';
    foreach($filtros as $key => $value) {
      if ($sqlWhere == '') {
        $sqlWhere .= ' where '. $key . " = :" . $key;
      } else {
        $sqlWhere .= ' and '. $key . " = :" . $key;
      }
    }
    $sql .= $sqlWhere;
    $stmt = $this->conn->prepare($sql);
    foreach($filtros as $key => $value) {
      $stmt->bindValue(':' . $key, $value);
    }
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

  public function update($modelo, $datos, $id){
    $set = '';

    foreach ($datos as $key => $value) {
      $set .= $key . '="' . $value . '",';
    }

    $set = trim($set, ',');
    $sql = 'update '.$modelo->table.' set ' . $set . ' where id = ' . $id;

    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }

  public function delete($modelo, $id){
    global $db;

    $sql = 'delete from '.$modelo->table.' where id = ' . $id;

    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }
}
