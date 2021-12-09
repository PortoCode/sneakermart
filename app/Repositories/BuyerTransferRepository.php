<?php

namespace App\Repositories;

use App\Models\BuyerTransfer;
use App\Repositories\BaseRepository;

/**
 * Class BuyerTransferRepository
 * @package App\Repositories
 * @version May 31, 2021, 8:10 pm -03
*/

class BuyerTransferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'buyer_id',
        'payment_id',
        'value',
        'pix_key',
        'is_transferred',
        'transfer_date',
        'bill_url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BuyerTransfer::class;
    }
}
