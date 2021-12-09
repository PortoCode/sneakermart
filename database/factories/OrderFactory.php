<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => $this->faker->randomDigitNotNull,
        'delivery_info_id' => $this->faker->randomDigitNotNull,
        'total_price' => $this->faker->randomDigitNotNull,
        'shipping_fee' => $this->faker->randomDigitNotNull,
        'size' => $this->faker->randomDigitNotNull,
        'is_paid' => $this->faker->word,
        'order_date' => $this->faker->date('Y-m-d H:i:s'),
        'is_delivered' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
