<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(200),
            'delivery_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'is_delivered' => $this->faker->boolean(),
        ];
    }
}
