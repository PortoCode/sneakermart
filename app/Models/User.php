<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use App\Helpers\Functions;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class User
 * @package App\Models
 * @version May 31, 2021, 8:07 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $stores
 * @property \Illuminate\Database\Eloquent\Collection $ratings
 * @property \Illuminate\Database\Eloquent\Collection $buyerTransfers
 * @property \Illuminate\Database\Eloquent\Collection $deliveryInfos
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $cpf
 * @property string $phone_number
 */
class User extends Authenticatable implements HasMedia
{
    use HasRoles;
    use HasFactory;
    use HasMediaTrait;

    public $table = 'users';

    public $fillable = [
        'email',
        'password',
        'name',
        'cpf',
        'phone_number',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'name' => 'string',
        'cpf' => 'string',
        'phone_number' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,id_to_ignore,id',
        'cpf' => 'required|string|max:255|unique:users,cpf,id_to_ignore,id',
        'phone_number' => 'required',
        'role_name' => 'required',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_updated_at',
        'readable_email_verified_at',
        'readable_role_name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stores()
    {
        return $this->hasMany(\App\Models\Store::class, 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'buyer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function latestOrders()
    {
        return $this->hasMany(\App\Models\Order::class, 'buyer_id')->take(3);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class, 'buyer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function buyerTransfers()
    {
        return $this->hasMany(\App\Models\BuyerTransfer::class, 'buyer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function deliveryInfos()
    {
        return $this->hasMany(\App\Models\DeliveryInfo::class, 'user_id')->take(3);
    }

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
     * Get readable_email_verified_at
     *
     * @return string
     */
    public function getReadableEmailVerifiedAtAttribute()
    {
        return Functions::formatDatetime($this->email_verified_at);
    }

    /**
     * Get role_name as stored in db
     *
     * @return string
     */
    public function getRoleNameAttribute()
    {
        return $this->getRoleNames()->first();
    }

    /**
     * Get role_name for humans
     *
     * @return string
     */
    public function getReadableRoleNameAttribute()
    {
        $roleName = strtoupper($this->role_name);
        return is_null($roleName)? null : config("enums.roles.$roleName.display_name");
    }

    /**
     * Set password
     *
     * @param string $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $value? $this->attributes['password'] = bcrypt($value) : null;
    }

    /**
     * File upload
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users')->singleFile();
    }
}
