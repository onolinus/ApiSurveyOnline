<?php

namespace tests\app\Libraries;

use App\AuthToken;
use app\Libraries\Structure\RedisToken;
use app\Libraries\Structure\SessionToken;
use App\Users;
use Mockery;

class AuthTokenTest extends \TestCase{

    public function test_generateNewSessionToken_using_parameter_user_id(){
        $AuthTokenMock = Mockery::mock('\App\AuthToken[isExistUser]')->shouldAllowMockingProtectedMethods();

        $user = new Users();
        $user->id = 5;
        $user->type = 'admin';
        $user->email = '12345@gmail.com';
        $user->password = 'xxx';
        $AuthTokenMock->shouldReceive('isExistUser')->once()->andReturn($user);

        $AuthTokenMockReflection = new  \ReflectionClass($AuthTokenMock);
        $method = $AuthTokenMockReflection->getMethod('generateNewSessionToken');
        $method->setAccessible(true);
        $sessionToken = $method->invoke($AuthTokenMock, 5);

        $attributes = $sessionToken->getAttribute();
        $this->assertArrayHasKey('access_token', $attributes);
        $this->assertArrayHasKey('user_type', $attributes);
        $this->assertArrayHasKey('token_type', $attributes);
        $this->assertArrayHasKey('expires_in', $attributes);
        $this->assertEquals($user->type, $attributes['user_type']);
    }

//    public function test_generateAuthToken_when_checkExistSessionToken_is_false(){
//        $data = [
//            'access_token' => 'xxx',
//            'user_id' => 1,
//            'user_type' => 'admin',
//            'token_type' => RedisToken::TOKEN_TYPE,
//            'created_at' => '2017-07-18 00:00:00',
//        ];
//        $RedisTokenMock = Mockery::mock('\app\Libraries\Structure\RedisToken[getCurrentTimeStamp]', [$data])->shouldAllowMockingProtectedMethods();
//        $RedisTokenMock->shouldReceive('getCurrentTimeStamp')->times(2)->andReturn(strtotime('2017-07-18 00:00:10'));
//
//        $AuthTokenMock = Mockery::mock('\App\AuthToken[getCurrentDate,getRedisToken]')->shouldAllowMockingProtectedMethods();
//        $AuthTokenMock->shouldReceive('getCurrentDate')->once()->andReturn('2016-07-19 00:00:10');
//        $AuthTokenMock->shouldReceive('getRedisToken')->once()->andReturn($RedisTokenMock);
//
//        /** @var SessionToken $sessionToken */
//        $sessionToken = $AuthTokenMock->getSessionToken($data['user_id']);
//
//        $this->assertEquals(array (
//            'user_id' => 1,
//            'user_type' => 'admin',
//            'token_type' => 'bearer',
//            'expires_in' => 3590,
//        ), $sessionToken->getAttribute()); die;
//    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        Mockery::close();
    }
}