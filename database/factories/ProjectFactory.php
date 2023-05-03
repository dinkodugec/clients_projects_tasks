<?php

namespace Database\Factories;

use App\Models\Project;
use Faker\Provider\uk_UA\Text;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProjectFactory extends Factory
{

        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,100),
            'client_id' => rand(1,100),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => Arr::random(Project::STATUS),
            'deadline' => $this->faker->dateTimeBetween('+1 month', '+6 month'),

        ];
    }
}
