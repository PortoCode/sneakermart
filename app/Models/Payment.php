<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Payment
 * @package App\Models
 * @version May 31, 2021, 8:10 pm -03
 *
 * @property \App\Models\Order $order
 * @property \Illuminate\Database\Eloquent\Collection $buyerTransfers
 * @property integer $order_id
 * @property number $value
 * @property string $payment_method
 * @property integer $pagarme_id
 * @property string $status
 * @property string $payment_date
 * @property string $bill_url
 */
class Payment extends Model
{

    use HasFactory;

    public $table = 'payments';
    



    public $fillable = [
        'order_id',
        'value',
        'payment_method',
        'pagarme_id',
        'status',
        'payment_date',
        'bill_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'value' => 'float',
        'payment_method' => 'string',
        'pagarme_id' => 'integer',
        'status' => 'string',
        'bill_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'value' => 'required',
        'payment_method' => 'required',
        'pagarme_id' => 'required',
        'status' => 'required',
        'payment_date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function buyerTransfers()
    {
        return $this->hasMany(\App\Models\BuyerTransfer::class, 'payment_id');
    }
}
