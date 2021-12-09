<?php

namespace Database\Factories;

use App\Models\ProductInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigitNotNull,
        'size' => $this->faker->randomDigitNotNull,
        'brand' => $this->faker->word,
        'model' => $this->faker->word,
        'stock' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
