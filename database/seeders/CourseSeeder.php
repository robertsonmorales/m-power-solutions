<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            "name" => "Global Financial Markets and Instruments",
        ]);
        
        Course::create([
            "name" => "Data Science",
        ]);
        
        Course::create([
            "name" => "Public Health",
        ]);
        
        Course::create([
            "name" => "Management",
        ]);
        
        Course::create([
            "name" => "Data Analytics",
        ]);
        
        Course::create([
            "name" => "Online MBA and Business",
        ]);
    }
}
