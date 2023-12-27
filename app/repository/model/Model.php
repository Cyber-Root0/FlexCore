<?php
namespace FlexCore\repository\model;
use FlexCore\handle\Model as BaseModel;
/**
 * Example Model
 */
class Model extends BaseModel
{
    protected string $table = "wp_users";
    protected string $primaryKey = "id";
}