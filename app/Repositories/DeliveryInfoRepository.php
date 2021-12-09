<?php

namespace App\Repositories;

use App\Models\DeliveryInfo;
use App\Repositories\BaseRepository;

/**
 * Class DeliveryInfoRepository
 * @package App\Repositories
 * @version May 31, 2021, 8:08 pm -03
*/

class DeliveryInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'recipient_name',
        'zipcode',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'complement',
        'reference'
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
        return DeliveryInfo::class;
    }
}
