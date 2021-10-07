<?php

namespace Database\Factories;

use App\Models\Read;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Read::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'read_title' => $this->faker->realText(50),
            'read_time' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now')->format('Y-m-d H:i:s'),
            'read_thought' => $this->faker->realText(150),
        ];
    }
}
