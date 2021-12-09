<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AppBaseController;

use Cep;

class AddressController extends AppBaseController
{
    /**
     * Find address by zipcode
     *
     * @return json
    */
    public function findByZipcode()
    {
        $cep = Cep::find(request()->zipcode);
        $address = $cep->getCepModel();
        if($address == null){
            return $this->sendError("CEP invalido.");
        }
        return $this->sendSuccess($address);
    }
}
