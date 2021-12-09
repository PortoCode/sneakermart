<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderProduct
 * @package App\Models
 * @version May 31, 2021, 8:09 pm -03
 *
 * @property \App\Models\Order $order
 * @property \App\Models\ProductInfo $productInfo
 * @property integer $order_id
 * @property integer $product_info_id
 * @property integer $quantity
 */
class OrderProduct extends Model
{

    use HasFactory;

    public $table = 'order_product';
    



    public $fillable = [
        'order_id',
        'product_info_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'product_info_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'product_info_id' => 'required',
        'quantity' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productInfo()
    {
        return $this->belongsTo(\App\Models\ProductInfo::class, 'product_info_id', 'id');
    }
}
