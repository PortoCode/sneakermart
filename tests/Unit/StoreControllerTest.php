<?php

namespace Test\Unit;

use App\DataTables\StoreDataTable;
use App\Http\Controllers\StoreController;
use App\Http\Requests\CreateStoreRequest;
use App\Models\Store;
use App\Repositories\StoreRepository;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    private $mockStoreRepository;

    public function setUp(): void
    {
        $this->mockStoreRepository = $this->createMock(StoreRepository::class);
    }

    public function testStoreControllerIndex()
    {
        $storeDataTable = $this->createMock(StoreDataTable::class);

        $storeController = $this->getStoreController();
        $return = $storeController->index($storeDataTable);

        $this->assertEquals($storeDataTable->render('admin.stores.index'), $return);
    }

    public function testStoreControllerStore()
    {
        $requestParameters = [
            "_token" => "QNohEeIEvwrTzWL2P0klPoCWMBfjcfQpzlHvIQCY",
            "seller_id" => "2",
            "name" => "Loja Legal",
            "zipcode" => "37500-433",
            "address" => "Rua Oscar Rennó",
            "address_number" => "95",
            "neighborhood" => "Nossa Senhora da Agonia",
            "city" => "Itajubá",
            "state" => "MG",
            "complement" => "Ap. 104",
            "phone_number" => "(35) 99133-9951"
        ];
        $requestCookies = [
            "XSRF-TOKEN" => "QNohEeIEvwrTzWL2P0klPoCWMBfjcfQpzlHvIQCY",
            "sneakermart_session" => "F2501vNtvTSDOH7Axc9mXq2DC9y7qMxDoYcUSiMR"
        ];
        $requestServer = [
            "USER" => "nginx",
            "HOME" => "/var/cache/nginx",
            "HTTP_UPGRADE_INSECURE_REQUESTS" => "1",
            "HTTP_COOKIE" => "XSRF-TOKEN=eyJpdiI6IllyM1hoNjBQazVRblltOGVLc3dHZEE9PSIsInZhbHVlIjoiQ2R1ekdhTGZIZmx2SjVvbzNXcmhYNzlteU5FaDBoeEFDSnV1aTNtb1k5TytUNW1QRlJwRlF1TnVGODczc2I1WWlDajQzb ▶",
            "HTTP_CONNECTION" => "keep-alive",
            "HTTP_DNT" => "1",
            "HTTP_ORIGIN" => "http://sneakermart.test",
            "HTTP_CONTENT_LENGTH" => "256",
            "HTTP_CONTENT_TYPE" => "application/x-www-form-urlencoded",
            "HTTP_REFERER" => "http://sneakermart.test/stores/create",
            "HTTP_ACCEPT_ENCODING" => "gzip, deflate",
            "HTTP_ACCEPT_LANGUAGE" => "en-US,en;q=0.5",
            "HTTP_ACCEPT" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "HTTP_USER_AGENT" => "Mozilla/5.0 (Windows NT 10.0; rv:78.0) Gecko/20100101 Firefox/78.0",
            "HTTP_HOST" => "sneakermart.test",
            "PATH_INFO" => "",
            "SCRIPT_FILENAME" => "/var/www/html/public/index.php",
            "REDIRECT_STATUS" => "200",
            "SERVER_NAME" => "",
            "SERVER_PORT" => "8000",
            "SERVER_ADDR" => "172.23.0.4",
            "REMOTE_PORT" => "60270",
            "REMOTE_ADDR" => "172.23.0.1",
            "SERVER_SOFTWARE" => "nginx/1.14.2",
            "GATEWAY_INTERFACE" => "CGI/1.1",
            "REQUEST_SCHEME" => "http",
            "SERVER_PROTOCOL" => "HTTP/1.1",
            "DOCUMENT_ROOT" => "/var/www/html/public",
            "DOCUMENT_URI" => "/index.php",
            "REQUEST_URI" => "/stores",
            "SCRIPT_NAME" => "/index.php",
            "CONTENT_LENGTH" => "256",
            "CONTENT_TYPE" => "application/x-www-form-urlencoded",
            "REQUEST_METHOD" => "POST",
            "QUERY_STRING" => "",
            "FCGI_ROLE" => "RESPONDER",
            "PHP_SELF" => "/index.php",
            "REQUEST_TIME_FLOAT" => 1628205419.6264,
            "REQUEST_TIME" => 1628205419,
            "argv" => [],
            "argc" => 0
        ];
        $request = new CreateStoreRequest([], $requestParameters, [], $requestCookies, [], $requestServer);

        $store = new Store();
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('create')
            ->with($requestParameters)
            ->willReturn($store);

        $storeController = $this->getStoreController();
        $return = $storeController->store($request);

        $this->assertEquals(redirect(route('stores.index')), $return);
    }

    public function testStoreControllerEditSuccess()
    {
        $id = 1;

        $store = new Store();
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($store);

        $storeController = $this->getStoreController();
        $storeController->edit($id);
    }

    public function testStoreControllerEditNoStoreReturn()
    {
        $id = 1;

        $store = [];
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($store);

        $storeController = $this->getStoreController();
        $return = $storeController->edit($id);

        $this->assertEquals(redirect(route('stores.index')), $return);
    }

    public function testStoreControllerDestroySuccess()
    {
        $id = 1;

        $store = new Store();
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($store);
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('delete')
            ->with($id);

        $storeController = $this->getStoreController();
        $storeController->destroy($id);
    }

    public function testStoreControllerDestroyNoStoreReturn()
    {
        $id = 1;

        $store = [];
        $this->mockStoreRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($store);

        $storeController = $this->getStoreController();
        $return = $storeController->destroy($id);

        $this->assertEquals(redirect(route('stores.index')), $return);
    }

    private function getStoreController()
    {
        return new StoreController($this->mockStoreRepository);
    }
}