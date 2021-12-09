<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->randomDigitNotNull,
        'value' => $this->faker->randomDigitNotNull,
        'payment_method' => $this->faker->word,
        'pagarme_id' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'payment_date' => $this->faker->date('Y-m-d H:i:s'),
        'bill_url' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
