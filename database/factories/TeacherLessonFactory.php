<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherLessonFactory extends Factory
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
            'lesson_id' => function (array $attributes) {
                return Lesson::factory()->create();
            }
        ];
    }
}
