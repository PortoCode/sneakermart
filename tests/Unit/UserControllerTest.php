<?php

namespace Test\Unit;

use App\DataTables\UserDataTable;
use App\Http\Controllers\UserController;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private $mockUserRepository;

    public function setUp(): void
    {
        $this->mockUserRepository = $this->createMock(UserRepository::class);
    }

    public function testUserControllerIndex()
    {
        $userDataTable = $this->createMock(UserDataTable::class);

        $userController = $this->getUserController();
        $return = $userController->index($userDataTable);

        $this->assertEquals($userDataTable->render('admin.users.index'), $return);
    }

    public function testUserControllerStore()
    {
        $requestParameters = [
            "_token" => "nFcCGvkEu7wQ4gLmKI5xbcwAQNPGE2sckdKu6pbJ",
            "name" => "José Francisco",
            "role_name" => "user",
            "cpf" => "128.120.536-23",
            "phone_number" => "(35) 99133-9951",
            "email" => "jos.francisco.nascimento@gmail.com",
            "password" => "@1q2w3e4r",
            "password_confirmation" => "@1q2w3e4r"
        ];
        $requestCookies = [
            "XSRF-TOKEN" => "nFcCGvkEu7wQ4gLmKI5xbcwAQNPGE2sckdKu6pbJ",
            "sneakermart_session" => "h8OUHI0Hl6hxQUPo9XulbIa1fIuISSLpUtX0DnQM"
        ];
        $requestServer = [
            "USER" => "nginx",
            "HOME" => "/var/cache/nginx",
            "HTTP_CACHE_CONTROL" => "max-age=0",
            "HTTP_SEC_FETCH_USER" => "?1",
            "HTTP_SEC_FETCH_SITE" => "same-origin",
            "HTTP_SEC_FETCH_MODE" => "navigate",
            "HTTP_SEC_FETCH_DEST" => "document",
            "HTTP_UPGRADE_INSECURE_REQUESTS" => "1",
            "HTTP_COOKIE" => "XSRF-TOKEN=eyJpdiI6IkM4S0JtQWEzbVdFU2F2RUVGZjB2RVE9PSIsInZhbHVlIjoiT2s2OWFWYVFXTTRIK0dsazJtV3lORmJaWjB1MGFhR3F1L0ZmRVNBU1Yyc0dTa0JRTUtyeE9oSUtoMVhFQjZmcTh5dVJxW ▶",
            "HTTP_CONNECTION" => "keep-alive",
            "HTTP_DNT" => "1",
            "HTTP_ORIGIN" => "http://localhost",
            "HTTP_CONTENT_LENGTH" => "1283",
            "HTTP_CONTENT_TYPE" => "multipart/form-data; boundary=---------------------------152978869935747721421692375522",
            "HTTP_REFERER" => "http://localhost/users/create",
            "HTTP_ACCEPT_ENCODING" => "gzip, deflate",
            "HTTP_ACCEPT_LANGUAGE" => "en-US,en;q=0.5",
            "HTTP_ACCEPT" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "HTTP_USER_AGENT" => "Mozilla/5.0 (Windows NT 10.0; rv:78.0) Gecko/20100101 Firefox/78.0",
            "HTTP_HOST" => "localhost",
            "PATH_INFO" => "",
            "SCRIPT_FILENAME" => "/var/www/html/public/index.php",
            "REDIRECT_STATUS" => "200",
            "SERVER_NAME" => "",
            "SERVER_PORT" => "8000",
            "SERVER_ADDR" => "172.23.0.4",
            "REMOTE_PORT" => "60200",
            "REMOTE_ADDR" => "172.23.0.1",
            "SERVER_SOFTWARE" => "nginx/1.14.2",
            "GATEWAY_INTERFACE" => "CGI/1.1",
            "REQUEST_SCHEME" => "http",
            "SERVER_PROTOCOL" => "HTTP/1.1",
            "DOCUMENT_ROOT" => "/var/www/html/public",
            "DOCUMENT_URI" => "/index.php",
            "REQUEST_URI" => "/users",
            "SCRIPT_NAME" => "/index.php",
            "CONTENT_LENGTH" => "1283",
            "CONTENT_TYPE" => "multipart/form-data; boundary=---------------------------152978869935747721421692375522",
            "REQUEST_METHOD" => "POST",
            "QUERY_STRING" => "",
            "FCGI_ROLE" => "RESPONDER",
            "PHP_SELF" => "/index.php",
            "REQUEST_TIME_FLOAT" => 1628199645.462,
            "REQUEST_TIME" => 1628199645,
            "argv" => [],
            "argc" => 0
        ];
        $request = new CreateUserRequest([], $requestParameters, [], $requestCookies, [], $requestServer);

        $user = new User();
        $this->mockUserRepository
            ->expects($this->once())
            ->method('create')
            ->with($requestParameters)
            ->willReturn($user);

        $userController = $this->getUserController();
        $return = $userController->store($request);

        $this->assertEquals(redirect(route('users.index')), $return);
    }

    public function testUserControllerEditSuccess()
    {
        $id = 1;

        $user = new User();
        $this->mockUserRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($user);

        $userController = $this->getUserController();
        $userController->edit($id);
    }

    public function testUserControllerEditNoUserReturn()
    {
        $id = 1;

        $user = [];
        $this->mockUserRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($user);

        $userController = $this->getUserController();
        $return = $userController->edit($id);

        $this->assertEquals(redirect(route('users.index')), $return);
    }

    public function testUserControllerDestroySuccess()
    {
        $id = 1;

        $user = new User();
        $this->mockUserRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($user);
        $this->mockUserRepository
            ->expects($this->once())
            ->method('delete')
            ->with($id);

        $userController = $this->getUserController();
        $userController->destroy($id);
    }

    public function testUserControllerDestroyNoUserReturn()
    {
        $id = 1;

        $user = [];
        $this->mockUserRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($user);

        $userController = $this->getUserController();
        $return = $userController->destroy($id);

        $this->assertEquals(redirect(route('users.index')), $return);
    }

    private function getUserController()
    {
        return new UserController($this->mockUserRepository);
    }
}