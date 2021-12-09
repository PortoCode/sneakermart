<?php

namespace Database\Factories;

use App\Models\DeliveryInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'recipient_name' => $this->faker->word,
        'zipcode' => $this->faker->word,
        'address' => $this->faker->word,
        'number' => $this->faker->word,
        'neighborhood' => $this->faker->word,
        'city' => $this->faker->word,
        'state' => $this->faker->word,
        'complement' => $this->faker->word,
        'reference' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
