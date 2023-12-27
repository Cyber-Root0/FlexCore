<?php
namespace FlexCore\handle;
use FlexCore\handle\api\ModelInterface;
use Foxdb\DB;
abstract class Model implements ModelInterface{

    protected string $table = "";
    protected string $primaryKey = "";    
    /**
     * Get row by id
     *
     * @param int $id
     * @return \InvalidArgumentException | array | bool | \stdClass
     */
    public function get(int $id) : \InvalidArgumentException | array | bool | \stdClass{
        
        if ($id === null || empty($id) || gettype($id) != "integer"){
            throw new \InvalidArgumentException("O registro não pode ser atualizado, id do objeto Entity {$this->table} inválido ou inexistente");
        }
        
        return DB::table($this->table)->where($this->primaryKey, $id)->first();

    }
    /**
     * Create record based on entity 
     *
     * @param  Entity $entity
     * @return bool
     */
    public function create(Entity $entity) : bool{

        $values = [];
        foreach($entity as $key => $value){

            $values[$key] = $value;

        }
        $id = DB::table($this->table)->insertGetId($values);
        return $id > 0;

    }
    
    /**
     * Delete row by id
     *
     * @param  int $id
     * @return bool
     */
    public function delete(int $id): bool{
        
       $affected = DB::table($this->table)->where($this->primaryKey, '=', $id)->delete();
        return $affected > 0;
    }
    /**
     * Find row based on entity
     *
     * @param  Entity $entity
     * @return array
     */
    public function find(Entity $entity) : array | false | \stdClass {

        $find = DB::table($this->table);
        foreach($entity as $key => $value){
            if ( $value === null || empty($value) ){
                continue;
            }
            $find = $find->where($key, '=', $value);
            $values[] = $value;
        }

        if (count($values) <= 0) {
            return false;
        }

        return $find->get();

    }    
    /**
     * Update rows based on entity
     *
     * @param  Entity $entity
     * @return \Exception | bool
     */
    public function update(Entity $entity) : \Exception | bool{
        $row = [];
        if ( !isset($entity->{$this->primaryKey}) || empty($entity->{$this->primaryKey}) || gettype($entity->{$this->primaryKey}) != "integer"){
            throw new \InvalidArgumentException("O registro não pode ser atualizado, id do objeto Entity {$this->table} inválido ou inexistente");
        }
        foreach($entity as $key => $value){
            if ( $value === null || empty($value) ){
                continue;
            }
            $row[$key] = $value;
        }
        $affecteds = DB::table($this->table)
        ->where($this->primaryKey, $entity->{$this->primaryKey})
            ->update($row);
        return $affecteds > 0;
    }    
    /**
     * Get All register from table
     *
     * @return \stdClass
     */
    public function getAll(){

     return  DB::table($this->table)->get();

    }
}