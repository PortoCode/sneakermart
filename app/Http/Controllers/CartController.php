<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CartController extends AppBaseController
{
    /**
     * Display the specified Cart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(request()->cart_id != 1){
            return $this->sendError("Carrinho invalido.");
        }
        return view('public.carts.index');
    }
}
