<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSubjectSeeder extends Seeder
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
                $subject = Subject::inRandomOrder()->first();
                $aux = $teacher->subjects()->find($subject->id);
                if($aux === null){
                    $teacher->subjects()->attach($subject);
                }
            }
        }
    }
}
