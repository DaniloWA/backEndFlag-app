<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Subject;
use App\Models\CourseSubject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            for($i = 0; $i<6;$i++) {
                $subject = Subject::inRandomOrder()->first();
                $aux = $course->subjects()->find($subject->id);
                if($aux === null){
                    $course->subjects()->attach($subject);
                }
            }
        }
    }
}
