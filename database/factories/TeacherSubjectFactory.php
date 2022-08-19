<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'teacher_id' => function (array $attributes) {
                return Teacher::factory()->create();
            },
            'subject_id' => function (array $attributes) {
                return Subject::factory()->create();
            }
        ];
    }
}
