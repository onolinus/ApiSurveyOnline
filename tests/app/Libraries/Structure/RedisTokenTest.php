<?php

namespace tests\app\Libraries\Structure;

use app\Libraries\Structure\RedisToken;


class RedisTokenTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        parent::setUp();
    }

    public function test_construct_where_param_data_is_not_array(){
        try{
            new RedisToken('test');
        }catch(\Exception $e){
            $this->assertEquals('Parameter data must be an array and cannot be empty : \'test\'', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_an_empty_array(){
        try{
            new RedisToken([]);
        }catch(\Exception $e){
            $this->assertNotFalse(strpos($e->getMessage(), 'Parameter data must be an array and cannot be empty'));
        }
    }

    public function test_construct_where_param_data_access_token_is_not_provided(){
        try{
            new RedisToken([
                'user_id' => 1,
                'user_type' => 'admin',
                'token_type' => RedisToken::TOKEN_TYPE,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }catch(\Exception $e){
            $this->assertEquals('Access token parameter required', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_not_complete(){
        try{
            new RedisToken(['access_token' => 'xxx']);
        }catch(\Exception $e){
            $this->assertEquals('Parameter data must be contain index : "user_id"', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_complete(){
        $data = [
            'access_token' => 'xxx',
            'user_id' => 1,
            'user_type' => 'admin',
            'token_type' => RedisToken::TOKEN_TYPE,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $RedisToken = new RedisToken([
            'access_token' => $data['access_token'],
            'user_id' => $data['user_id'],
            'user_type' => $data['user_type'],
            'token_type' => $data['token_type'],
            'created_at' => $data['created_at'],
        ]);

        // get all attributes
        $this->assertEquals([
            'user_id' => $data['user_id'],
            'user_type' => $data['user_type'],
            'token_type' => $data['token_type'],
            'created_at' => $data['created_at'],
        ], $RedisToken->getAttribute());


        // get single attribute
        $this->assertEquals($data['user_id'], $RedisToken->getAttribute('user_id'));
        $this->assertEquals($data['user_type'], $RedisToken->getAttribute('user_type'));
        $this->assertEquals($data['token_type'], $RedisToken->getAttribute('token_type'));
        $this->assertEquals($data['created_at'], $RedisToken->getAttribute('created_at'));

        // get invalid attribute
        $this->assertNull($RedisToken->getAttribute('invalid_attribute_name'));
    }

    public function test_setAttribute_where_param_name_is_not_valid(){
        $data = [
            'access_token' => 'xxx',
            'user_id' => 1,
            'user_type' => 'admin',
            'token_type' => RedisToken::TOKEN_TYPE,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $RedisToken = new RedisToken([
            'access_token' => $data['access_token'],
            'user_id' => $data['user_id'],
            'user_type' => $data['user_type'],
            'token_type' => $data['token_type'],
            'created_at' => $data['created_at'],
        ]);

        // update attribute using the right name
        $RedisToken->setAttribute('user_id', 2);
        $this->assertEquals(2, $RedisToken->getAttribute('user_id'));

        // update attribute using the wrong name
        try{
            $RedisToken->setAttribute('invalid_attribute_name', 3);
        }catch(\Exception $e){
            $this->assertEquals('attribute invalid_attribute_name does not exist', $e->getMessage());
        }
    }
}