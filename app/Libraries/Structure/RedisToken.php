<?php
namespace app\Libraries\Structure;

class RedisToken extends StructureAbstract
{
    protected $attributes = ['user_id', 'user_type', 'token_type', 'expires_in'];

}