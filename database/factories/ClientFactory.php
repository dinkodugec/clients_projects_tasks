<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Address;

class ClientFactory extends Factory
{
          /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'company_name' => $this->faker->company(),
          'company_address' => $this->faker->address(),
          'email' => $this->faker->companyEmail(),
          'company_city' => $this->faker->city(),
          'contact_person' => $this->faker->name(),



        ];
    }
}
