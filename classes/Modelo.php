<?php

class Modelo
{
  protected $table;
  public $columns;
  public $datos;
  protected $db;

  public function __construct($datos=[]){
    $this->datos = $datos;
    $this->db = new MySQL_DB('mysql:host=localhost; dbname=patitasacasa; charset=utf8');
  }

  public function getColumns(){
    return $this->columns;
  }

  public function getDatos(){
    return $this->datos;
  }

  public function save(){
    if (!$this->getAttr('id')) {
      $this->insert();
    } else {
      $this->update();
    }
  }

  private function insert(){
    $this->db->insert($this, $this->datos);
  }

  private function update(){
    $this->db->update($this, $this->datos, $this->getAttr('id'));
  }

  public function delete(){
    $this->db->delete($this, $this->getAttr('id'));
  }

  public function getAttr($attr){
    return isset($this->datos[$attr]) ? $this->datos[$attr] : null;
  }

  public function setAttr($attr, $value){
    $this->datos[$attr] = $value;
  }

  public function find($id){

    if ($fila= $this->db->find($this, $id)){
      foreach ($fila as $attr => $value) {
        $this->setAttr($attr, $value);
      }
      return $this;
    }
    return false;
  }

  public function findAll(){
    $todosLosObjetos = $this->db->findAll($this);
    return isset($todosLosObjetos) ? $todosLosObjetos : null;
  }

  public function findBy($filtros){
    $todosLosObjetos = $this->db->findBy($this, $filtros);
    return isset($todosLosObjetos) ? $todosLosObjetos : null;
  }

  public function findXAttr($key, $traer){
// traer me indica si quiero que me devuelva el usuario en este objeto o solo que devuelva true
    if ($fila= $this->db->findXAttr($this, $key)){
      if ($traer)  {
        foreach ($fila as $attr => $value) {
          $this->setAttr($attr, $value);
        }
        return $this;
      }else{
        return true;
      }
    }
    return false;
  }
}
