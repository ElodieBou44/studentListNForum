<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name(),
            'address'   => $this->faker->streetAddress(), 
            'phone'     => $this->faker->phoneNumber('en_CA'),
            'email'     => $this->faker->unique()->safeEmail(),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'city_id'   => City::factory()
        ];
    }
}
