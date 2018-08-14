<?php
require_once('Modelo.php');

class Mascota extends Modelo
{
  public $table = 'mascotas';
  public $columns = ['id',
                    'tipo',
                    'nombre',
                    'edad',
                    'tamanio',
                    'sexo',
                    'user_id'
                    ];

  public function validar() {
    $errores = [];

    if($this->getAttr('tipo') == '' ) {
      $errores[] = "Debe elegir el tipo de mascota";
    }
    if($this->getAttr('nombre') == '') {
      $errores[] = "Debe completar el nombre de la mascota";
    }
    if($this->getAttr('edad') == '') {
      $errores[] = "Debe completar la edad de la mascota";
    }
    if($this->getAttr('tamanio') == '') {
      $errores[] = "Debe elegir el tamaño de la mascota";
    }
    if($this->getAttr('sexo') == '') {
      $errores[] = "Debe elegir el sexo de la mascota";
    }
    return $errores;
  }

  public function findBy($filtros) {
    $filtros['user_id'] = $_SESSION['id'];
    return parent::findBy($filtros);
  }

  public function findMisMascotas() {
    $filtros = [];
    $filtros['user_id'] = $_SESSION['id'];

    return parent::findBy($filtros);
  }
}
