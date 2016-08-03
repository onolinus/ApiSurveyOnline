<?php

namespace tests\app\Libraries\Structure;

use app\Libraries\Structure\RedisAccessToken;


class RedisAccessTokenTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        parent::setUp();
    }

    public function test_construct_where_param_data_is_not_array(){
        try{
            new RedisAccessToken('test');
        }catch(\Exception $e){
            $this->assertEquals('Parameter data must be an array and cannot be empty : \'test\'', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_an_empty_array(){
        try{
            new RedisAccessToken([]);
        }catch(\Exception $e){
            $this->assertNotFalse(strpos($e->getMessage(), 'Parameter data must be an array and cannot be empty'));
        }
    }

    public function test_construct_where_param_data_access_token_is_not_provided(){
        try{
            new RedisAccessToken([
                'user_id' => 1,
                'user_type' => 'admin',
                'token_type' => RedisAccessToken::TOKEN_TYPE,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }catch(\Exception $e){
            $this->assertEquals('Access token parameter required', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_not_complete(){
        try{
            new RedisAccessToken(['access_token' => 'xxx']);
        }catch(\Exception $e){
            $this->assertEquals('Parameter data must be contain index : "user_id"', $e->getMessage());
        }
    }

    public function test_construct_where_param_data_is_complete(){
        $data = [
            'access_token' => 'xxx',
            'refresh_token' => 'yyyy',
            'user_id' => 1,
            'user_type' => 'admin',
            'token_type' => RedisAccessToken::TOKEN_TYPE,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $RedisAccessToken = new RedisAccessToken([
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'],
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
            'refresh_token' => 'yyyy'
        ], $RedisAccessToken->getAttribute());


        // get single attribute
        $this->assertEquals($data['user_id'], $RedisAccessToken->getAttribute('user_id'));
        $this->assertEquals($data['user_type'], $RedisAccessToken->getAttribute('user_type'));
        $this->assertEquals($data['token_type'], $RedisAccessToken->getAttribute('token_type'));
        $this->assertEquals($data['created_at'], $RedisAccessToken->getAttribute('created_at'));

        // get invalid attribute
        $this->assertNull($RedisAccessToken->getAttribute('invalid_attribute_name'));
    }

    public function test_setAttribute_where_param_name_is_not_valid(){
        $data = [
            'access_token' => 'xxx',
            'refresh_token' => 'yyyy',
            'user_id' => 1,
            'user_type' => 'admin',
            'token_type' => RedisAccessToken::TOKEN_TYPE,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $RedisAccessToken = new RedisAccessToken([
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'],
            'user_id' => $data['user_id'],
            'user_type' => $data['user_type'],
            'token_type' => $data['token_type'],
            'created_at' => $data['created_at'],
        ]);

        // update attribute using the right name
        $RedisAccessToken->setAttribute('user_id', 2);
        $this->assertEquals(2, $RedisAccessToken->getAttribute('user_id'));

        // update attribute using the wrong name
        try{
            $RedisAccessToken->setAttribute('invalid_attribute_name', 3);
        }catch(\Exception $e){
            $this->assertEquals('attribute invalid_attribute_name does not exist', $e->getMessage());
        }
    }
}