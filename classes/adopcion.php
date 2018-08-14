<?php
require_once('Modelo.php');

class Adopcion extends Modelo
{
  public $table = 'adopciones';
  public $columns = ['id',
                    'usuario_id',
                    'mascota_id'
                    ];
}
