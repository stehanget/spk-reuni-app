<?php

namespace Database\Factories;

use App\Models\Alternative;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlternativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alternative::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'major_id'      => rand(1, 10),
            'university_id' => rand(1, 5),
            'accreditation'     => rand(50, 100),
            'entry_fee'         => rand(1000000, 10000000)
        ];
    }
}
