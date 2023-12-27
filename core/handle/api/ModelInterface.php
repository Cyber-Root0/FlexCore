<?php

namespace FlexCore\handle\api;
use FlexCore\handle\Entity;
interface ModelInterface{
public function get(int $id ) : \InvalidArgumentException | array | bool | \stdClass;
public function find(Entity $entity) : array | false | \stdClass;
public function create(Entity $entity ) : bool;
public function update(Entity $entity) : \Exception | bool;
public function delete(int $id) : bool;
}