<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,

            'gender' => $this->faker->randomElement(['男性', '女性']),

            'email' => $this->faker->unique()->safeEmail,

            'postcode' => $this->faker->numerify('###-####'),

            'address' => $this->faker->address,

            'building_name' => $this->faker->secondaryAddress,

            'opinion' => $this->faker->realText(10)
        ];
    }
}
