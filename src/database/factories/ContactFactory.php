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
            'lastname' => $this->faker-> lastName(),
            'firstname' => $this->faker-> firstName(),
            'gender'=> $this->faker->randomElement(['男性', '女性','その他']),
            'email'=> $this->faker->safeEmail(),
            'tel'=> $this->faker-> phoneNumber(),
            'address'=> $this->faker->address(),
            'category_id'=> $this->faker->numberBetween(1,5),
            'detail'=> $this->faker->realText(120)
        ];
    }
}