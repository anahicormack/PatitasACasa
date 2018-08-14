<?php

class JSON_DB extends DB
{

  private $file;

  public function __construct()
  {
    $this->file = __DIR__ . '/../vet.json';
  }

  public function insert($modelo, $datos)
  {
    $insert = [
      $modelo->table => $datos
    ];
    $insert = json_encode($insert);
    file_put_contents($this->file, $insert);
  }

  public function update($modelo, $datos, $id){

  }

  public function delete($modelo, $id){

  }

  public function find($modelo, $id){

  }

  public function findAll($modelo){

  }
  public function findBy($modelo, $filtros){

  }
  public function findXAttr($modelo, $attr){

  }

}
