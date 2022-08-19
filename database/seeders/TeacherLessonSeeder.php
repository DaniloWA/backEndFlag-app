<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = Teacher::all();

        foreach ($teachers as $teacher) {
            for($i = 0; $i<6;$i++) {
                $lesson = Lesson::inRandomOrder()->first();
                $aux = $teacher->lessons()->find($lesson->id);
                if($aux === null){
                    $teacher->lessons()->attach($lesson);
                }
            }
        }
    }
}
