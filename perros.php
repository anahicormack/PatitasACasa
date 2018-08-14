<?php
require_once('funcionesProyectoFinal.php');
$mascota = new Mascota();
  $filtros['tipo'] = "perro";
  $todasmascotasPerros = $mascota->findByAttr($filtros);
  var_dump($todasmascotasPerros);

 ?>
