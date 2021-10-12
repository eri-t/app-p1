<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->name(),
            'position' => $this->faker->name(),
            'start_date' => $this->faker->year(),
            'finish_date' => $this->faker->year(),
            'user_id'     => rand(1, 5),
        ];
    }
}
