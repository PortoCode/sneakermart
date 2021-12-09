<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Rating
 * @package App\Models
 * @version May 31, 2021, 8:09 pm -03
 *
 * @property \App\Models\User $buyer
 * @property \App\Models\Order $order
 * @property \App\Models\Store $store
 * @property integer $buyer_id
 * @property integer $order_id
 * @property integer $store_id
 * @property number $stars
 * @property string $description
 */
class Rating extends Model
{

    use HasFactory;

    public $table = 'ratings';
    



    public $fillable = [
        'buyer_id',
        'order_id',
        'store_id',
        'stars',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buyer_id' => 'integer',
        'order_id' => 'integer',
        'store_id' => 'integer',
        'stars' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'buyer_id' => 'required',
        'order_id' => 'required',
        'store_id' => 'required',
        'stars' => 'required',
        'description' => 'required'
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
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class, 'store_id', 'id');
    }
}
