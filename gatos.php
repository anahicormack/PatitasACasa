<?php
require_once('funcionesProyectoFinal.php');
$mascota = new Mascota();
  $filtros['tipo'] = "gato";
  $todasmascotasGatos = $mascota->findByAttr($filtros);
  var_dump($todasmascotasGatos);
 ?>
