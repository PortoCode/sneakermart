<?php

namespace App\Http\Controllers;

use App\DataTables\StoreDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Repositories\StoreRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Store;
use App\Models\User;
use Response;

class StoreController extends AppBaseController
{
    /** @var  StoreRepository */
    private $storeRepository;

    public function __construct(StoreRepository $storeRepo)
    {
        $this->storeRepository = $storeRepo;
    }

    /**
     * Display a listing of the Store.
     *
     * @param StoreDataTable $storeDataTable
     * @return Response
     */
    public function index(StoreDataTable $storeDataTable)
    {
        return $storeDataTable->render('admin.stores.index');
    }

    /**
     * Show the form for creating a new Store.
     *
     * @return Response
     */
    public function create()
    {

        $users = User::orderByRaw('name COLLATE utf8mb4_unicode_ci')->get();
        $sellersArray = [];
        foreach ($users as $user) {
            if ($user->readable_role_name == 'Usuário') {
                $sellersArray[$user->id] = $user->name;
            }
        }
        return view('admin.stores.create', compact('sellersArray'));
    }

    /**
     * Store a newly created Store in storage.
     *
     * @param CreateStoreRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreRequest $request)
    {
        $input = $request->all();

        $store = $this->storeRepository->create($input);

        Flash::success(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.saved", "f"));

        return redirect(route('stores.index'));
    }

    /**
     * Display the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showPage($id)
    {
        $store = Store::find($id);
        if (empty($store)) {
            Flash::error(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.not_found", "f"));

            return redirect(route('home.show'));
        }
        return view('public.stores.index', compact('store', $store));
    }

    /**
     * Display the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $requested_id = intval(request()->store_id);
        $logged_user_store = $logged_user->stores->first();
        if($logged_user_role == 'user'){
            if($logged_user_store == null){
                return view('user.profile.index')->with('user', $logged_user);
            }
            $latest_orders = $logged_user_store->latestOrders; 
            return view('user.store.index')->with('store', $logged_user_store)->with('latest_orders', $latest_orders);
        }else{
            $store = Store::find($requested_id);
            return view('admin.stores.show')->with('store', $store);
        }
    }

    /**
     * Show the form for editing the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            Flash::error(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.not_found", "f"));

            return redirect(route('stores.index'));
        }

        $users = User::orderByRaw('name COLLATE utf8mb4_unicode_ci')->get();
        $sellersArray = [];
        foreach ($users as $user) {
            if ($user->readable_role_name == 'Usuário') {
                $sellersArray[$user->id] = $user->name;
            }
        }
        return view('admin.stores.edit', compact('store', 'sellersArray'));
    }

    /**
     * Update the specified Store in storage.
     *
     * @param  int              $id
     * @param UpdateStoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreRequest $request)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $logged_user_store = $logged_user->stores->first();
        if($logged_user_role == 'user'){
            if($logged_user_store->id != $id){
                Flash::error('Você não tem permissão para editar outra loja.');
                return view('user.store.index')->with('store', $logged_user_store);
            }
        }

        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            Flash::error(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.not_found", "f"));

            return redirect(route('stores.index'));
        }

        $store = $this->storeRepository->update($request->all(), $id);

        Flash::success(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.updated", "f"));
        if($logged_user_role == 'admin'){
            return redirect(route('stores.index'));
        }else{
            return json_encode($store);
        }
    }

    /**
     * Remove the specified Store from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            Flash::error(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.not_found", "f"));

            return redirect(route('stores.index'));
        }

        $this->storeRepository->delete($id);

        Flash::success(\Lang::choice("tables.stores", "s")." ".\Lang::choice("flash.deleted", "f"));

        return redirect(route('stores.index'));
    }
}
