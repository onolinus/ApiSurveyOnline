<?php
namespace app\Libraries\Structure;

class RedisToken extends StructureAbstract
{
    protected $attributes = ['user_id', 'user_type', 'token_type', 'created_at'];

    public function getCurrentTimeStamp(){
        return strtotime(date('Y-m-d H:i:s'));
    }
}