<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'name'=> $this->faker->unique()->name,
            'route'=> $this->faker->name,
            'rows'=> $this->faker->numberBetween($min = 4, $max = 14),
            'body'=> $this->faker->paragraph,
            'from'=> $this->faker->city,
            'to'=> $this->faker->city,
            'date'=> $this->faker->date,
            'time'=> $this->faker->time,
        ];
    }
}
