<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\StudentLog;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectLog>
 */
class SubjectLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $student = StudentLog::inRandomOrder()->first();
        $subject = Subject::inRandomOrder()->first();
        return [
            'uuid' => $this->faker->uuid(),
            'slug' => Str::slug($student->slug. '-'.  $subject->slug),
            'grades' => $this->faker->numberBetween(0,20),
            'frequency' => $this->faker->numberBetween(0,100),
            'student_log_id' => $student->id,
            'subject_id' => $subject->id,
        ];
    }
}
