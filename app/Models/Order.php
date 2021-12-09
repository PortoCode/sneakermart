<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version May 31, 2021, 8:09 pm -03
 *
 * @property \App\Models\Store $store
 * @property \App\Models\DeliveryInfo $deliveryInfo
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property \Illuminate\Database\Eloquent\Collection $payments
 * @property \Illuminate\Database\Eloquent\Collection $ratings
 * @property integer $store_id
 * @property integer $delivery_info_id
 * @property number $total_price
 * @property number $shipping_fee
 * @property integer $size
 * @property boolean $is_paid
 * @property string $order_date
 * @property boolean $is_delivered
 */
class Order extends Model
{

    use HasFactory;

    public $table = 'orders';

    public $fillable = [
        'buyer_id',
        'store_id',
        'delivery_info_id',
        'total_price',
        'shipping_fee',
        'is_paid',
        'order_date',
        'is_delivered'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buyer_id' => 'integer',
        'store_id' => 'integer',
        'delivery_info_id' => 'integer',
        'total_price' => 'float',
        'shipping_fee' => 'float',
        'is_paid' => 'boolean',
        'is_delivered' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'store_id' => 'required',
        'buyer_id' => 'required',
        'delivery_info_id' => 'required',
        'total_price' => 'required',
        'shipping_fee' => 'required',
        'is_paid' => 'required',
        'order_date' => 'required',
        'is_delivered' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class, 'store_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function buyer()
    {
        return $this->belongsTo(\App\Models\User::class, 'buyer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function deliveryInfo()
    {
        return $this->belongsTo(\App\Models\DeliveryInfo::class, 'delivery_info_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class, 'order_id');
    }
}
