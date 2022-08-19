<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Departament;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(20)->create([
            'departament_id' => function(array $attributes) {
                return Departament::inRandomOrder()->first();
            }
        ]);

        
    }
}
