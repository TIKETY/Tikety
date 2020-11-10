<?php

namespace Database\Factories;

use App\Models\Seat;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'bus_id'=>Bus::factory(),
            'seat'=>$this->faker->numberBetween($min = 1, $max = 72)
        ];
    }
}
