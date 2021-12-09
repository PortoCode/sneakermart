<?php

namespace App\Repositories;

use App\Models\ProductInfo;
use App\Repositories\BaseRepository;

/**
 * Class ProductInfoRepository
 * @package App\Repositories
 * @version May 31, 2021, 8:08 pm -03
*/

class ProductInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'size',
        'brand',
        'model',
        'stock',
        'price'
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
        return ProductInfo::class;
    }
}
