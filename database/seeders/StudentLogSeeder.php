<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentLog::factory(300)->create([
             'student_id' => function (array $attributes) {
                return Student::inRandomOrder()->first();
            }
        ]);
    }
}
