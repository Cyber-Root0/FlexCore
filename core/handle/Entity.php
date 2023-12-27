<?php
namespace FlexCore\handle;
class Entity
{
    public function __get($name){
        if (property_exists($this, $name)){
            return $this->$name;
        }
        $classname = __CLASS__;
        throw new \Exception("Propriedade {$name} da classe {$classname} invalida", 1);
        
    }
    public function __set($name, $value){
        if (property_exists($this, $name)){
            $this->$name = $value;
        }
        $classname = __CLASS__;
        throw new \Exception("Propriedade {$name} da classe {$classname} invalida", 1);
    }
}