<?php

namespace Database\Factories;

use App\Models\BuyerTransfer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerTransferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BuyerTransfer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buyer_id' => $this->faker->randomDigitNotNull,
        'payment_id' => $this->faker->randomDigitNotNull,
        'value' => $this->faker->randomDigitNotNull,
        'pix_key' => $this->faker->word,
        'is_transferred' => $this->faker->word,
        'transfer_date' => $this->faker->date('Y-m-d H:i:s'),
        'bill_url' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
