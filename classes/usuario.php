<?php

class Usuario extends Modelo
{
  public $table = 'usuarios';
  public $columns = ['id',
                    'name',
                    'lastname',
                    'email',
                    'zonaPertenencia',
                    'password'];





 public function existeEmail(){

 }

}
