<?php

abstract class DB
{
  abstract public function insert($modelo, $datos);
  abstract public function update($modelo, $datos, $id);
  abstract public function find($modelo, $id);
  abstract public function findAll($modelo);
  abstract public function findXAttr($modelo, $attr);
}
