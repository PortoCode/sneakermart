<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BuyerTransfer
 * @package App\Models
 * @version May 31, 2021, 8:10 pm -03
 *
 * @property \App\Models\User $buyer
 * @property \App\Models\Payment $payment
 * @property integer $buyer_id
 * @property integer $payment_id
 * @property number $value
 * @property string $pix_key
 * @property boolean $is_transferred
 * @property string $transfer_date
 * @property string $bill_url
 */
class BuyerTransfer extends Model
{

    use HasFactory;

    public $table = 'buyer_transfers';
    



    public $fillable = [
        'buyer_id',
        'payment_id',
        'value',
        'pix_key',
        'is_transferred',
        'transfer_date',
        'bill_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buyer_id' => 'integer',
        'payment_id' => 'integer',
        'value' => 'float',
        'pix_key' => 'string',
        'is_transferred' => 'boolean',
        'bill_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'buyer_id' => 'required',
        'payment_id' => 'required',
        'value' => 'required',
        'pix_key' => 'required',
        'is_transferred' => 'required',
        'transfer_date' => 'required'
    ];

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
    public function payment()
    {
        return $this->belongsTo(\App\Models\Payment::class, 'payment_id', 'id');
    }
}
