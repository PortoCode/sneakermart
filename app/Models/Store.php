<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Functions;

/**
 * Class Store
 * @package App\Models
 * @version May 31, 2021, 8:07 pm -03
 *
 * @property \App\Models\User $seller
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $ratings
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property integer $seller_id
 * @property string $name
 */
class Store extends Model
{

    use HasFactory;

    public $table = 'stores';

    public $fillable = [
        'seller_id',
        'name',
        'phone_number',
        'address',
        'address_number',
        'complement',
        'neighborhood',
        'zipcode',
        'city',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'name' => 'string',
        'phone_number' => 'string',
        'address' => 'string',
        'address_number' => 'string',
        'complement' => 'string',
        'neighborhood' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seller_id' => 'required',
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'address_number' => 'required',
        'neighborhood' => 'required',
        'zipcode' => 'required',
        'city' => 'required',
        'state' => 'required'
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_updated_at',
        'readable_address',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seller()
    {
        return $this->belongsTo(\App\Models\User::class, 'seller_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lastProducts()
    {
        return $this->hasMany(\App\Models\Product::class, 'store_id')->take(2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class, 'store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function latestOrders()
    {
        return $this->hasMany(\App\Models\Order::class, 'store_id')->take(3);
    }

    // =========================================================================
    // Getters
    // =========================================================================

    /**
     * Get readable_created_at
     *
     * @return string
     */
    public function getReadableCreatedAtAttribute()
    {
        return Functions::formatDatetime($this->created_at);
    }

    /**
     * Get readable_updated_at
     *
     * @return string
     */
    public function getReadableUpdatedAtAttribute()
    {
        return Functions::formatDatetime($this->updated_at);
    }

    /**
     * Get whole address formated
     *
     * @return string
     */
    public function getReadableAddressAttribute()
    {
        if($this->complement){
            $address = $this->address . ' ' . $this->address_number . '. ' . $this->complement . ' . ' . $this->neighborhood . ".\n" . $this->city . ' - ' . $this->state . '. ' . $this->zipcode;
        }else{
            $address = $this->address . ' ' . $this->address_number . '. ' . $this->neighborhood . ". " . $this->city . ' - ' . $this->state . '. ' . $this->zipcode;
        }
        return $address;
    }
}
