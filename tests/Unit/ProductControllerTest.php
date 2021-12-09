<?php

namespace Test\Unit;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\ProductController;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    private $mockProductRepository;

    public function setUp(): void
    {
        $this->mockProductRepository = $this->createMock(ProductRepository::class);
    }

    public function testProductControllerIndex()
    {
        $productDataTable = $this->createMock(ProductDataTable::class);

        $productController = $this->getProductController();
        $return = $productController->index($productDataTable);

        $this->assertEquals($productDataTable->render('admin.products.index'), $return);
    }

    public function testProductControllerEditSuccess()
    {
        $id = 1;

        $product = new Product();
        $this->mockProductRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($product);

        $productController = $this->getProductController();
        $productController->edit($id);
    }

    public function testProductControllerEditNoProductReturn()
    {
        $id = 1;

        $product = [];
        $this->mockProductRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($product);

        $productController = $this->getProductController();
        $return = $productController->edit($id);

        $this->assertEquals(redirect(route('products.index')), $return);
    }

    public function testProductControllerDestroySuccess()
    {
        $id = 1;

        $product = new Product();
        $this->mockProductRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($product);
        $this->mockProductRepository
            ->expects($this->once())
            ->method('delete')
            ->with($id);

        $productController = $this->getProductController();
        $productController->destroy($id);
    }

    public function testProductControllerDestroyNoProductReturn()
    {
        $id = 1;

        $product = [];
        $this->mockProductRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($product);

        $productController = $this->getProductController();
        $return = $productController->destroy($id);

        $this->assertEquals(redirect(route('products.index')), $return);
    }

    private function getProductController()
    {
        return new ProductController($this->mockProductRepository);
    }
}