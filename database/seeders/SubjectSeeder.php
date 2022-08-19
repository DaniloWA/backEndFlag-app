<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Departament;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::factory(6)->create([
            'departament_id' => function (array $attributes) {
                return Departament::inRandomOrder()->first();
            }
        ]);
    }
}
