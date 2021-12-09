<?php

namespace App\Models;

use App\Helpers\Functions;
use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProductInfo
 * @package App\Models
 * @version May 31, 2021, 8:08 pm -03
 *
 * @property \App\Models\Product $product
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property integer $product_id
 * @property integer $size
 * @property string $brand
 * @property string $model
 * @property integer $stock
 * @property number $price
 */
class ProductInfo extends Model
{

    use HasFactory;

    public $table = 'product_infos';




    public $fillable = [
        'product_id',
        'size',
        'brand',
        'model',
        'stock',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'size' => 'integer',
        'brand' => 'string',
        'model' => 'string',
        'stock' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'brand' => 'required',
        'stock' => 'required',
        'price' => 'required'
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_updated_at',
        'readable_price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'product_info_id');
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
     * Get readable_price
     *
     * @return string
     */
    public function getReadablePriceAttribute()
    {
        return Functions::formatCurrency($this->price);
    }
}
