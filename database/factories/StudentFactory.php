<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "full_name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "contact" => "",
            "region" => $this->faker->address(),
            "section" => $this->faker->numberBetween(1, 10),
            "status_id" => $this->faker->numberBetween(1,3)
        ];
    }
}
