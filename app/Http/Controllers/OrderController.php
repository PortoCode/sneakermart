<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\OrderProduct;
use App\Repositories\OrderProductRepository;
use Response;
use Illuminate\Support\Facades\DB;
use Auth;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    /** @var  OrderProductRepository */
    private $orderProductRepository;

    public function __construct(OrderRepository $orderRepo, OrderProductRepository $orderProductRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->orderProductRepository = $orderProductRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function index(OrderDataTable $orderDataTable)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $logged_user_store = $logged_user->stores->first();
        if($logged_user_role == 'user'){
            $realized_orders = $logged_user->orders;
            $received_orders = $logged_user_store->orders;
            if($logged_user_store == null){
                return view('user.profile.index')->with('user', $logged_user);
            }
            return view('user.orders.index')->with('realized_orders', $realized_orders)->with('received_orders', $received_orders);
        }else{
            return $orderDataTable->render('orders.index');
        }
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        DB::beginTransaction();
        $loggedUser = \Auth::user();
        $input = $request->all();
        $productInfos = DB::table('product_infos')->pluck('price','id')->toArray();

        foreach ($input['store_order'] as $storeId => $storeOrder) {
            $orderData = [
                'buyer_id' => $loggedUser->id,
                'store_id' => $storeId,
                'delivery_info_id' => $input['delivery_info_id'],
                'total_price' => $storeOrder['shipping_fee'],
                'shipping_fee' => $storeOrder['shipping_fee'],
                'is_paid' => 0,
                'is_delivered' => 0
            ];

            $orderProductsData = [];
            foreach ($storeOrder['products'] as $orderProduct) {
                $orderProductsData[] = [
                    'product_info_id' => $orderProduct['product_info_id'],
                    'quantity' => $orderProduct['quantity']
                ];

                $orderData += ($productInfos[$orderProduct['product_info_id']] * $orderProduct['quantity']);
            }

            $order = $this->orderRepository->create($orderData);

            foreach ($orderProductsData as $orderProductData) {
                $orderProductData['order_id'] = $order->id;

                $this->orderProductRepository->create($orderProductData);
            }
        }

        DB::commit();
        dd($order);
        Flash::success('Order saved successfully.');
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {   
        if(request()->order_id != 1){
            return $this->sendError("Pedido invalido.");
        }
        $delivery_infos = Auth::user()->deliveryInfos;
        return view('public.orders.index')->with('delivery_infos', $delivery_infos);

        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
}
