<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\Store;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $logged_user_store = $logged_user->stores->first();
        if($logged_user_role == 'user'){
            if($logged_user_store == null){
                return view('user.profile.index')->with('user', $logged_user);
            }
            $products = $logged_user_store->products;
            return view('user.products.index')->with('products', $products);
        }else{
            return $productDataTable->render('admin.products.index');
        }
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $storesArray = Store::orderByRaw('name COLLATE utf8mb4_unicode_ci')->pluck('name','id')->toArray();
        return view('admin.products.create', compact('storesArray'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        // Get only product model infos
        $input = $request->except(
            'brand',
            'model',
            'allSizes',
            'allStocks',
            'price'
        );
        // Get store id
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        if($logged_user_role == 'user'){
            $input['store_id'] = $logged_user->stores()->first()->id;
        }else{
            $input['store_id'] = $request['store_id'];
        }
        // Create product
        $product = $this->productRepository->create($input);

        // When creating a new product, it's possible to input more than one size (and one stock amount for it).
        // This goes through each size inputed and store it
        $product_infos['product_id'] = $product->id;
        $product_infos['brand'] = $request['brand'];
        $product_infos['model'] = $request['model'];
        $priceTrim = str_replace('R$', '', $request['price']);
        $priceTrim = str_replace('.', '', $priceTrim);
        $product_infos['price'] = floatval(str_replace(',', '.', $priceTrim));

        foreach($request['allSizes'] as $key => $size){
            $product_infos['size'] = $size;
            $product_infos['stock'] = $request['allStocks'][$key];
            $product_info = ProductInfo::create($product_infos);
        }
        Flash::success(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.saved", "m"));
        // Redirect each role to it's view
        if($logged_user_role == 'user'){
            return json_encode($product);
        }else{
            return redirect(route('products.index'));
        }
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('products.index'));
        }

        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('products.index'));
        }

        $storesArray = Store::orderByRaw('name COLLATE utf8mb4_unicode_ci')->pluck('name','id')->toArray();
        return view('admin.products.edit', compact('product', 'storesArray'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        // Get only product model infos
        $input = $request->except(
            'brand',
            'model',
            'allSizes',
            'allStocks',
            'price'
        );
        // Get store id
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        if($logged_user_role == 'user'){
            $input['store_id'] = $logged_user->stores()->first()->id;
        }else{
            $input['store_id'] = $request['store_id'];
        }
        // Create product
        $product = $this->productRepository->update($request->all(), $id);

        // When editing a product, it's possible to input more than one size (and one stock amount for it).
        // This goes through each size inputed and store it
        $product_infos['product_id'] = $product->id;
        $product_infos['brand'] = $request['brand'];
        $product_infos['model'] = $request['model'];
        $product_infos['price'] = floatval(str_replace('R$', '', $request['price']));
        foreach($request['allSizes'] as $key => $size){
            $product_infos['size'] = $size;
            $product_infos['stock'] = $request['allStocks'][$key];
            $product_info_id = $request['allProductInfosIds'][$key];
            // Update product info or create it if it's a new one
            if($product_info_id == null){
                $product_info = ProductInfo::create($product_infos);
            }else{
                $product_info = ProductInfo::where('id', $product_info_id)->update($product_infos);
            }
        }
        // Delete product infos that are not here
        $all_product_infos_ids = $product->productInfos->pluck('id');
        foreach($all_product_infos_ids as $product_info_id){
            if(!in_array($product_info_id, $request['allProductInfosIds'])){
                ProductInfo::destroy($product_info_id);
            }
        }
        Flash::success('Product updated successfully.');
        // Redirect each role to it's view
        if($logged_user_role == 'user'){
            return json_encode($product);
        }else{
            return redirect(route('products.index'));
        }
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.deleted", "m"));

        return redirect(route('products.index'));
    }

   /**
     * Display the specified Product page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showPage($id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            Flash::error(\Lang::choice("tables.products", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('home.show'));
        }
        return view('public.products.index', compact('product', $product));
    }
}
