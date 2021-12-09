<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Response;
use Spatie\Permission\Models\Role;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $rolesArray = Role::get()->sortBy('id')->pluck('display_name', 'name')->toArray();
        return view('admin.users.create', compact('rolesArray'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $user = $this->userRepository->create($input);
        $user->assignRole($input["role_name"]);

        Flash::success(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.saved", "m"));
        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $requested_id = intval(request()->user_id);
        if($logged_user_role == 'user'){
            if($logged_user->id != $requested_id){
                return redirect(route('admin.users.show', $logged_user->id));
            }
            $delivery_infos = $logged_user->deliveryInfos;
            $latest_orders = $logged_user->latestOrders; 
            return view('user.profile.index')->with('user', $logged_user)->with('delivery_infos', $delivery_infos)->with('latest_orders', $latest_orders);
        }else{
            $user = User::find($requested_id);
            return view('admin.users.show')->with('user', $user);
        }
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('users.index'));
        }

        $rolesArray = Role::get()->sortBy('id')->pluck('display_name', 'name')->toArray();
        return view('admin.users.edit', compact('user', 'rolesArray'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update(UpdateUserRequest $request)
    {
        $logged_user = \Auth::user();
        $logged_user_role = $logged_user->getRoleNameAttribute();
        $requested_id = intval(request()->user_id);
        if($logged_user_role == 'user'){
            if($logged_user->id != $requested_id){
                Flash::error('Você não tem permissão para editar outro usuário.');
                return view('user.profile.index')->with('user', $logged_user);
            }
        }
        $user = $this->userRepository->find($requested_id);

        if (empty($user)) {
            Flash::error(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('users.index'));
        }

        $input = $request->except(
            'password',
            'password_confirmation'
        );

        if($request['keep_password']!=true){
            $input['password'] = bcrypt($request['password']);
        }
        if($logged_user_role == 'user' && $input['photo']){
            $input['photo'] = base64_encode($input['photo']); 
        }
        $user = $this->userRepository->update($input, $requested_id);
        $user->syncRoles($input['role_name']);

        Flash::success(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.updated", "m"));

        if($logged_user_role == 'user'){
            return json_encode($logged_user);
        }else{
            return redirect(route('users.index'));
        }
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.not_found", "m"));

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success(\Lang::choice("tables.users", "s")." ".\Lang::choice("flash.deleted", "m"));

        return redirect(route('users.index'));
    }
}
