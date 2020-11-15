<?php

namespace Database\Factories;

use App\Models\Fleet;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fleet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bus_id'=>Bus::factory(),
            'user_id'=>User::factory()
        ];
    }
}
