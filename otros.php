<?php
require_once('funcionesProyectoFinal.php');
$mascota = new Mascota();
  $filtros['tipo'] = "otro";
  $todasmascotasOtros = $mascota->findByAttr($filtros);
  var_dump($todasmascotasOtros);

 ?>
