<?php
require_once('funcionesProyectoFinal.php');

$user = new Usuario();

$todosLosUsuarios = $user->findAll();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

      <table>
         <tr>
         <?php foreach ($user->getColumns() as $columna):?>
           <th><?=$columna;?></th>
         <?php endforeach; ?>
         </tr>
         <?php foreach ($todosLosUsuarios as $unUsuario):?>
           <tr>
            <?php foreach ($unUsuario->getDatos() as $dato):?>
             <td><?=$dato;?></td>
             <pre>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
       </table>
  </body>
</html>
