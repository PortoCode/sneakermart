<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DeliveryInfo
 * @package App\Models
 * @version May 31, 2021, 8:08 pm -03
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property integer $user_id
 * @property string $recipient_name
 * @property string $zipcode
 * @property string $address
 * @property string $number
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property string $complement
 * @property string $reference
 */
class DeliveryInfo extends Model
{

    use HasFactory;

    public $table = 'delivery_infos';
    



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'recipient_name' => 'string',
        'zipcode' => 'string',
        'address' => 'string',
        'number' => 'string',
        'neighborhood' => 'string',
        'city' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'recipient_name' => 'required',
        'zipcode' => 'required',
        'address' => 'required',
        'number' => 'required',
        'neighborhood' => 'required',
        'city' => 'required',
        'state' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'delivery_info_id');
    }
}
