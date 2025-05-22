<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'user_id' => rand(1, 2), // creates user if not passed
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'contact_person' => $this->faker->name,
        ];
    }
}
