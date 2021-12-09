<?php

namespace App\Http\Controllers;

use App\DataTables\DeliveryInfoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDeliveryInfoRequest;
use App\Http\Requests\UpdateDeliveryInfoRequest;
use App\Repositories\DeliveryInfoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class DeliveryInfoController extends AppBaseController
{
    /** @var  DeliveryInfoRepository */
    private $deliveryInfoRepository;

    public function __construct(DeliveryInfoRepository $deliveryInfoRepo)
    {
        $this->deliveryInfoRepository = $deliveryInfoRepo;
    }

    /**
     * Display a listing of the DeliveryInfo.
     *
     * @param DeliveryInfoDataTable $deliveryInfoDataTable
     * @return Response
     */
    public function index(DeliveryInfoDataTable $deliveryInfoDataTable)
    {
        return $deliveryInfoDataTable->render('delivery_infos.index');
    }

    /**
     * Show the form for creating a new DeliveryInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('delivery_infos.create');
    }

    /**
     * Store a newly created DeliveryInfo in storage.
     *
     * @param CreateDeliveryInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliveryInfoRequest $request)
    {
        $input = $request->all();
        $deliveryInfo = $this->deliveryInfoRepository->create($input);

        Flash::success('Endereço salvo com sucesso!');
        $logged_user = \Auth::user();
        $delivery_infos = $logged_user->deliveryInfos;
        $latest_orders = $logged_user->latestOrders; 
        return view('user.profile.index')->with('user', $logged_user)->with('delivery_infos', $delivery_infos)->with('latest_orders', $latest_orders);
    }

    /**
     * Display the specified DeliveryInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deliveryInfo = $this->deliveryInfoRepository->find($id);

        if (empty($deliveryInfo)) {
            Flash::error('Delivery Info not found');

            return redirect(route('deliveryInfos.index'));
        }

        return view('delivery_infos.show')->with('deliveryInfo', $deliveryInfo);
    }

    /**
     * Show the form for editing the specified DeliveryInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deliveryInfo = $this->deliveryInfoRepository->find($id);

        if (empty($deliveryInfo)) {
            Flash::error('Delivery Info not found');

            return redirect(route('deliveryInfos.index'));
        }

        return view('delivery_infos.edit')->with('deliveryInfo', $deliveryInfo);
    }

    /**
     * Update the specified DeliveryInfo in storage.
     *
     * @param  int              $id
     * @param UpdateDeliveryInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliveryInfoRequest $request)
    {
        $deliveryInfo = $this->deliveryInfoRepository->find(request()->delivery_info_id);
        if (empty($deliveryInfo)) {
            Flash::error('Delivery Info not found');

            return redirect(route('deliveryInfos.index'));
        }

        $deliveryInfo = $this->deliveryInfoRepository->update($request->all(), request()->delivery_info_id);
        Flash::success('Endereço atualizado com sucesso!');
        $logged_user = \Auth::user();
        $delivery_infos = $logged_user->deliveryInfos;
        $latest_orders = $logged_user->latestOrders; 
        return view('user.profile.index')->with('user', $logged_user)->with('delivery_infos', $delivery_infos)->with('latest_orders', $latest_orders);
    }

    /**
     * Remove the specified DeliveryInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deliveryInfo = $this->deliveryInfoRepository->find($id);

        if (empty($deliveryInfo)) {
            Flash::error('Delivery Info not found');

            return redirect(route('deliveryInfos.index'));
        }

        $this->deliveryInfoRepository->delete($id);

        Flash::success('Endereço deletado com sucesso!');
        $logged_user = \Auth::user();
        $delivery_infos = $logged_user->deliveryInfos;
        $latest_orders = $logged_user->latestOrders; 
        return view('user.profile.index')->with('user', $logged_user)->with('delivery_infos', $delivery_infos)->with('latest_orders', $latest_orders);
    }
}
