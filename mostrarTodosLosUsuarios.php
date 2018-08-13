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
            <?php endforeach; ?>
            <td>
              <form class="" action="update.php" method="post">
              <input hidden type="text" name="id" value="<?=$unUsuario->getAttr('id');?>">
              <button type="submit" class="btn-primary">Editar</button>
              </form>
            </td>
            <td>
              <form class="" action="eliminar.php" method="post">
              <input hidden type="text" name="id" value="<?=$unUsuario->getAttr('id');?>">
              <button type="submit" class="btn-primary">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
       </table>
  </body>
</html>
