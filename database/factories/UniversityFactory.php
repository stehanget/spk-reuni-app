<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = University::class;

    /**
     * Define the model's default state.
     * 
     * @return array
     */
    public function definition()
    {
        return [
            'location_id'   => rand(1, 5),
            'title'         => $this->faker->word(),
            'category'      => rand(1, 2)
        ];
    }
}
