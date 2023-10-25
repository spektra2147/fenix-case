<?php

namespace Database\Factories;

use App\Models\Subscribes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscribes>
 */
class SubscribesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscribes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $receiptToken = sprintf(
            "%03d-%03d-%03d-%s%s-%03d",
            fake()->randomNumber(3),
            fake()->randomNumber(3),
            fake()->randomNumber(3),
            fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            fake()->randomElement(['X', 'Y', 'Z']),
            fake()->randomNumber(3)
        );

        return [
            'device_id' => fake()->numberBetween(1,50),
            'receipt_token' => $receiptToken,
            'product_id' => fake()->numberBetween(1,3),
        ];
    }
}
