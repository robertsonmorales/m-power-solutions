<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()
            ->count(50)
            ->create();

        // Students::create([
        //     "full_name" => $this->faker->name(),
        //     "contact" => "09" . mt_rand(000000000,999999999),
        //     "region" => $this->faker->region(),
        //     "section" => $this->faker->numberBetween(1, 10),
        //     "status_id" => $this->faker->numberBetween(1,3)
        // ]);
    }
}
