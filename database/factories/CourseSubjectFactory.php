<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => function (array $attributes) {
                return Course::factory()->create();
            },
            'subject_id' => function (array $attributes) {
                return Subject::factory()->create();
            }
        ];
    }
}
