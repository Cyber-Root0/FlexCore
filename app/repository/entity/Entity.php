<?php
namespace FlexCore\repository\entity;
use FlexCore\handle\Entity as BaseEntity;
/**
 * Example Entity
 */
class Entity extends BaseEntity
{
    public int $id;
    public string $user_login;
    public string $user_pass;
    public string $user_nicename;
    public string $user_email;
    public string $user_url;
    public string $display_name;

}