<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\StudentLog;
use App\Models\SubjectLog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectLog::factory(20)->create([
            'student_log_id' => function (array $attributes) {
                return StudentLog::inRandomOrder()->first();
            },
            'subject_id' => function (array $attributes) {
                return Subject::inRandomOrder()->first();
            },
        ]);
    }
}
