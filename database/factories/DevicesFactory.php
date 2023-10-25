<?php

namespace Database\Factories;

use App\Models\Devices;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Devices>
 */
class DevicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devices::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $token = sprintf(
            "%04d-%05d-%04d-%s%s-%04d",
            fake()->randomNumber(4),
            fake()->randomNumber(5),
            fake()->randomNumber(4),
            fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            fake()->randomElement(['X', 'Y', 'Z']),
            fake()->randomNumber(4)
        );

        return [
            'device_token' => $token,
            'config' => null,
            'last_activity' => now(),
            'is_premium' => fake()->boolean(),
        ];
    }
}
