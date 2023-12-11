<?php

namespace Database\Factories;

use App\Models\reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    protected $model = reservation::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'guests' => $this->faker->randomDigit,
            'message' => $this->faker->optional()->text(1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
