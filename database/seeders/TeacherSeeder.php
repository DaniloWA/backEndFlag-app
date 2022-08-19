<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Departament;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(20)->create([
             'departament_id' => function (array $attributes) {
                return Departament::inRandomOrder()->first();
            }
        ]);
    }
}
