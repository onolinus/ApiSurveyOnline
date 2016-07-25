<?php

namespace tests\app\Libraries;

use App\AuthToken;
use app\Libraries\Structure\RedisToken;
use app\Libraries\Structure\SessionToken;
use App\Users;
use Mockery;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class AuthTokenTest extends \TestCase{

    public function test_generateNewSessionToken_where_method_isExistUser_return_new_user_object(){
        $CacheMock = Mockery::mock('alias:\Illuminate\Support\Facades\Cache');
        $CacheMock->shouldReceive('put')->once()->andReturn('x');

        $AuthTokenMock = Mockery::mock('\App\AuthToken[isExistUser,setNewAccessToken,getAccessToken]')->shouldAllowMockingProtectedMethods();

        $user = new Users();
        $user->id = 5;
        $user->type = 'admin';
        $user->email = '12345@gmail.com';
        $user->password = 'xxx';
        $AuthTokenMock->shouldReceive('isExistUser')->once()->andReturn($user);
        $AuthTokenMock->shouldReceive('setNewAccessToken')->once()->andReturn($AuthTokenMock);
        $AuthTokenMock->shouldReceive('getAccessToken')->times(3)->andReturn('xxx');

        $AuthTokenMockReflection = new  \ReflectionClass($AuthTokenMock);
        $method_generateNewSessionToken = $AuthTokenMockReflection->getMethod('generateNewSessionToken');
        $method_generateNewSessionToken->setAccessible(true);
        $sessionToken = $method_generateNewSessionToken->invoke($AuthTokenMock, 5);

        $attributes = $sessionToken->getAttribute();

        $method_getAccessToken = $AuthTokenMockReflection->getMethod('getAccessToken');
        $method_getAccessToken->setAccessible(true);
        $this->assertEquals($attributes['access_token'], $method_getAccessToken->invoke($AuthTokenMock));

        $this->assertArrayHasKey('access_token', $attributes);
        $this->assertArrayHasKey('user_type', $attributes);
        $this->assertArrayHasKey('token_type', $attributes);
        $this->assertArrayHasKey('expires_in', $attributes);
        $this->assertEquals($user->type, $attributes['user_type']);
    }

    public function test_generateNewSessionToken_where_method_isExistUser_return_false(){
        $AuthTokenMock = Mockery::mock('\App\AuthToken[isExistUser]')->shouldAllowMockingProtectedMethods();
        $msg = 'exception happened here, user not exist';
        $AuthTokenMock->shouldReceive('isExistUser')->once()->andThrow(new \Exception($msg));

        $AuthTokenMockReflection = new  \ReflectionClass($AuthTokenMock);
        $method = $AuthTokenMockReflection->getMethod('generateNewSessionToken');
        $method->setAccessible(true);

        try{
            $method->invoke($AuthTokenMock, 5);
        }catch(\Exception $e){
            $this->assertEquals($msg, $e->getMessage());
        }
    }

    public function test_setSessionTokenByAccessToken_where_found_in_cache(){
        $AuthTokenMock = Mockery::mock('\App\AuthToken[isFoundInCache]')->shouldAllowMockingProtectedMethods();

        $data = ['user_id' => 1, 'user_type' => 'admin', 'token_type' => 'bearer', 'created_at' => '2016-07-26 00:00:00'];
        $AuthTokenMock->shouldReceive('isFoundInCache')->once()->andReturn($data);

        $AuthTokenMockReflection = new  \ReflectionClass($AuthTokenMock);
        $method_setSessionTokenByAccessToken = $AuthTokenMockReflection->getMethod('setSessionTokenByAccessToken');
        $method_setSessionTokenByAccessToken->setAccessible(true);
        $sessionToken = $method_setSessionTokenByAccessToken->invoke($AuthTokenMock, 'xxx');

        $attributes = $sessionToken->getAttribute();

        $method_getAccessToken = $AuthTokenMockReflection->getMethod('getAccessToken');
        $method_getAccessToken->setAccessible(true);
        $this->assertEquals($attributes['access_token'], $method_getAccessToken->invoke($AuthTokenMock));

        $this->assertArrayHasKey('access_token', $attributes);
        $this->assertArrayHasKey('user_type', $attributes);
        $this->assertArrayHasKey('token_type', $attributes);
        $this->assertArrayHasKey('expires_in', $attributes);
        $this->assertEquals($data['user_type'], $attributes['user_type']);
    }

    public function test_setSessionTokenByAccessToken_where_not_found_in_cache_then_return_null(){
        $AuthTokenMock = Mockery::mock('\App\AuthToken[isFoundInCache]')->shouldAllowMockingProtectedMethods();

        $AuthTokenMock->shouldReceive('isFoundInCache')->once()->andReturn(false);

        $AuthTokenMockReflection = new  \ReflectionClass($AuthTokenMock);
        $method_setSessionTokenByAccessToken = $AuthTokenMockReflection->getMethod('setSessionTokenByAccessToken');
        $method_setSessionTokenByAccessToken->setAccessible(true);
        $method_setSessionTokenByAccessToken->invoke($AuthTokenMock, 'xxx');

        $this->assertNull($AuthTokenMock->getSessionToken());
        $this->assertNull($AuthTokenMock->getRedisToken());

        $method_getAccessToken = $AuthTokenMockReflection->getMethod('getAccessToken');
        $method_getAccessToken->setAccessible(true);
        $this->assertNull($method_getAccessToken->invoke($AuthTokenMock));
    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        Mockery::close();
    }
}