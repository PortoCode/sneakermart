<?php

namespace App\Http\Controllers;

use App\DataTables\ProductInfoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductInfoRequest;
use App\Http\Requests\UpdateProductInfoRequest;
use App\Repositories\ProductInfoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductInfoController extends AppBaseController
{
    /** @var  ProductInfoRepository */
    private $productInfoRepository;

    public function __construct(ProductInfoRepository $productInfoRepo)
    {
        $this->productInfoRepository = $productInfoRepo;
    }

    /**
     * Display a listing of the ProductInfo.
     *
     * @param ProductInfoDataTable $productInfoDataTable
     * @return Response
     */
    public function index(ProductInfoDataTable $productInfoDataTable)
    {
        return $productInfoDataTable->render('product_infos.index');
    }

    /**
     * Show the form for creating a new ProductInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_infos.create');
    }

    /**
     * Store a newly created ProductInfo in storage.
     *
     * @param CreateProductInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductInfoRequest $request)
    {
        $input = $request->all();

        $productInfo = $this->productInfoRepository->create($input);

        Flash::success('Product Info saved successfully.');

        return redirect(route('productInfos.index'));
    }

    /**
     * Display the specified ProductInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productInfo = $this->productInfoRepository->find($id);

        if (empty($productInfo)) {
            Flash::error('Product Info not found');

            return redirect(route('productInfos.index'));
        }

        return view('product_infos.show')->with('productInfo', $productInfo);
    }

    /**
     * Show the form for editing the specified ProductInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productInfo = $this->productInfoRepository->find($id);

        if (empty($productInfo)) {
            Flash::error('Product Info not found');

            return redirect(route('productInfos.index'));
        }

        return view('product_infos.edit')->with('productInfo', $productInfo);
    }

    /**
     * Update the specified ProductInfo in storage.
     *
     * @param  int              $id
     * @param UpdateProductInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductInfoRequest $request)
    {
        $productInfo = $this->productInfoRepository->find($id);

        if (empty($productInfo)) {
            Flash::error('Product Info not found');

            return redirect(route('productInfos.index'));
        }

        $productInfo = $this->productInfoRepository->update($request->all(), $id);

        Flash::success('Product Info updated successfully.');

        return redirect(route('productInfos.index'));
    }

    /**
     * Remove the specified ProductInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productInfo = $this->productInfoRepository->find($id);

        if (empty($productInfo)) {
            Flash::error('Product Info not found');

            return redirect(route('productInfos.index'));
        }

        $this->productInfoRepository->delete($id);

        Flash::success('Product Info deleted successfully.');

        return redirect(route('productInfos.index'));
    }
}
