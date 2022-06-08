<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            "name" => "Active",
            "color" => "#18AB56",
            "bg_color" => "#F0FFF8"
        ]);

        Status::create([
            "name" => "Pending",
            "color" => "#FFBC10",
            "bg_color" => "#FEFFE6"
        ]);

        Status::create([
            "name" => "Drop Out",
            "color" => "#EB5757",
            "bg_color" => "#FFF0F0"
        ]);
    }
}
