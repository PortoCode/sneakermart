<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Store;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $created_user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'cpf' => $data['cpf'],
            'phone_number' => $data['phone_number'],
        ]);
        if(array_key_exists('isSeller', $data)){
            $created_store = Store::create([
                'seller_id' => $created_user->id,
                'name' => $data['store_infos']['name'],
                'phone_number' => $data['store_infos']['phone_number'],
                'address' => $data['store_infos']['address'],
                'address_number' => $data['store_infos']['address_number'],
                'complement' => $data['store_infos']['complement'],
                'neighborhood' => $data['store_infos']['neighborhood'],
                'zipcode' => $data['store_infos']['zipcode'],
                'city' => $data['store_infos']['city'],
                'state' => $data['store_infos']['state'],
            ]);
        }
        \DB::table('model_has_roles')->insert(['role_id' => config('enums.roles.USER.id'), 'model_type' => 'App\Models\User','model_id' => $created_user->id]);

        return $created_user;
    }
}
