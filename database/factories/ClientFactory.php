<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->email(),
            'contact_phone_number' => $this->faker->phoneNumber(),
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'company_city' => $this->faker->city(),
            'company_zip' => $this->faker->randomNumber(5),
            'company_vat' => $this->faker->randomNumber(9),
        ];
    }
}
