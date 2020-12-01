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
            'name'=> $this->faker->unique()->company,
            'platenumber'=> $this->faker->unique()->swiftBicNumber,
            'route'=> $this->faker->name,
            'rows'=> $this->faker->numberBetween($min = 4, $max = 14),
            'body'=> $this->faker->paragraph,
            'from'=> $this->faker->city,
            'image_url'=>'profile_images/3Rh3KnwOmPG9zdVM0DqTSomstAcMWNeNm1AgN5xg.jpeg',
            'amount'=>25000,
            'phonenumber'=> $this->faker->phoneNumber,
            'address'=> $this->faker->address,
            'workinghours'=> $this->faker->time,
            'to'=> $this->faker->city,
            'date'=> $this->faker->date,
            'time'=> $this->faker->time,
        ];
    }
}
